# Solar Tracker

Projeto realizado no 12ª para a PAP

Este projeto, Solar Tracker, foi pensado de forma a tirar maior rendimento de um painel solar orientando-o consoante a direção do sol, independentemente da estação do ano em que que se encontra, garantindo assim o máximo proveito da luz solar. 
Foi criado também uma aplicação Web que monitoriza os valores enviados pelo ESP32 tendo ligação a uma base de dados. Esta aplicação Web foi construído com um design apelativo e de fácil manuseamento.

O microcontrolador liga-se à internet por wifi e, toda a informação que este recebe, é enviada para um ficheiro PHP online, de cinco em cinco segundos, que se encontra no nosso domínio cuja função é inserir a informação recebida pelo ESP32 na nossa base de dados online.

Para o hardware a linguagem utilizada foi C#, no ambiente do Arduino IDE. Esta linguagem é orientada a objetos e baseada em C++.

Este projeto foi desenvolvido tendo por base o modelo de arquitetura MVC, juntamente com a framework PHP CodeIgniter. 
As linguagens utilizadas durante o desenvolvimento do projeto foram: 
  HTML;
  
  CSS;
  
  Javascript;
  
  PHP;
  
  MySQL ─ SGBD que utiliza a linguagem SQL;
  
  
Além destas linguagens os recursos utilizados foram:

  CodeIgniter ─ Framework de desenvolvimento de aplicações em PHP;
  
  BootStrap ─ Framework que atua em HTML, CSS e JavaScript e permite a criação de elementos estilizados;
  
  XAMPP ─ Ferramenta que permite usar o computador como servidor local;
