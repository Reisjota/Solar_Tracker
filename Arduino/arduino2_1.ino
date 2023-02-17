#include <Servo.h>
boolean t = false;
int servo1 = 0;
int servo2 = 0;
int pos = 90;
int pos2 = 90;
int contador = 0;
int movimentosh = 0;
int movimentosv = 0;
String enviar;
Servo servo_1;
Servo servo_2;
int currentMillis, previousMillis = 0, currentMillis1, previousMillis1 = 0;


void setup(){
   Serial.begin(9600);
   servo_1.attach(6);
   servo_1.write(90);
   servo_2.attach(5);
   servo_2.write(90);
}
void loop()
{
  currentMillis = millis();
  currentMillis1 = millis();
  int ldrStatus0 = analogRead(A0);
  int ldrStatus1 = analogRead(A1);
  int ldrStatus2 = analogRead(A2);
  int ldrStatus3 = analogRead(A3);
  
  if(currentMillis - previousMillis > 5000){
      previousMillis=currentMillis;
      String movh = String(movimentosh);
      String movv = String(movimentosv);
      String volt = String(leituraPainel());
      String tot = movh + "," + movv + "," + volt;
      Serial.println(tot);
      Serial.flush();
      movimentosh = 0;
      movimentosv = 0;
      leituraPainel();
      
  }
  if(currentMillis1 - previousMillis1 > 25){
    previousMillis1=currentMillis1;
    if ((ldrStatus0 <= 100 && ldrStatus1 <= 100 && ldrStatus2 <= 100 && ldrStatus3 <= 100) || (ldrStatus0 > 100 && ldrStatus1 > 100 && ldrStatus2 > 100 && ldrStatus3 > 100)){
      
    }
    else{
      if (ldrStatus0 <= 100 && ldrStatus1 <= 100){ //
        if (pos > 20){
          if (servo1 == 0 || servo1 == 2){
            movimentosh++;
            servo1 = 1;
          }
          pos--;
        }
      }
      else if (ldrStatus2 <= 100 && ldrStatus3 <= 100){ //
        if (pos < 160){
          if (servo1 == 0 || servo1 == 1){
            movimentosh++;
            servo1 = 2;
          }
          pos++;
        }
      }
      if (ldrStatus0 <= 100 && ldrStatus3 <= 100)
      {
        if (pos2 < 160){
          if (servo2 == 0 || servo2 == 2){
            movimentosv++;
            servo2 = 1;
          }
          pos2++;
        }
      }
      else if (ldrStatus1 <= 100 && ldrStatus2 <= 100){
        if (pos2 > 85){
          if (servo2 == 0 || servo2 == 1){
            movimentosv++;
            servo2 = 2;
          }
          pos2--;
        }
      }
      servo_1.write(pos);
      servo_2.write(pos2);
           
    }
  }
}

double leituraPainel(){
  int leituraPainel = analogRead(A5);
  float voltagemPainel= 2*(leituraPainel * (5.0 / 1023.0));
  return voltagemPainel;
}
