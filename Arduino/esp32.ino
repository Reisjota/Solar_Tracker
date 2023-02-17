#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#endif

// Replace with your network credentials
const char* ssid = "HUAWEI Y6 Pro 2017";
const char* password = "pedromaia";

// REPLACE with your Domain name and URL path or IP address with path bbbbbb
const char* serverName = "https://solartracker.pt/esp-data-post.php";

// Keep this API Key value to be compatible with the PHP code provided in the project page. 
// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 
String apiKeyValue = "tPmAT5Ab3j7F9";
String incomingString = "";

char i;
/*#include <SPI.h>
#define BME_SCK 18
#define BME_MISO 19
#define BME_MOSI 23
#define BME_CS 5*/

void setup() {
  Serial.begin(9600);
  
  WiFi.begin(ssid, password);
  //Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
   // Serial.print(".");
  }
  //Serial.println("");
 // Serial.print("Connected to WiFi network with IP Address: ");
  //Serial.println(WiFi.localIP());
}

void loop() {
  if (Serial.available() > 0) {
    incomingString = Serial.readString();
    
    if(WiFi.status()== WL_CONNECTED){
      HTTPClient http;
      
      // Your Domain name with URL path or IP address with path
      http.begin(serverName);
      
      // Specify content-type header
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      
      // Prepare your HTTP POST request data
      String httpRequestData = "api_key=" + apiKeyValue + "&incomingString=" + incomingString + "";
      int httpResponseCode = http.POST(httpRequestData);
      
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }

      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    Serial.flush();
  }
}
