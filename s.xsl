<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:output method="html" indent="yes"/>
  
  <xsl:template match="/">
    <html>
      <head>
        <title>Calendrier des événements</title>
        <style>
          /* Styles CSS */
          body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
          }
          .container {
            width: 80%;
            margin: 20px auto;
          }
          select {
            padding: 5px;
            font-size: 16px;
          }
          .calendar {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          .day {
            margin-bottom: 20px;
          }
          .event {
            background-color: #fff;
            padding: 10px;
            border-left: 5px solid orange;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          }
          .event-title {
            font-weight: bold;
            color: #333;
          }
          .event-discipline {
            color: brown;
          }
          .event-room {
            color: #555;
          }
          .event:nth-child(even) {
            background-color: #f9f9f9;
          }
          .index-button {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
          }
          .index-button:hover {
            background-color: #ff6600;
          }
        </style>
      </head>
      <body>
        <div class="container">
          <!-- Menu déroulant de filtrage -->
          <select id="disciplineFilter" onchange="filterEvents()">
            <option value="">Toutes les disciplines</option>
            <xsl:for-each select="//soumission/discipline[not(. = preceding-sibling::soumission/discipline)]">
              <xsl:sort select="."/>
              <option value="{.}">
                <xsl:value-of select="."/>
              </option>
            </xsl:for-each>
          </select>
          
          <!-- Calendrier -->
          <div class="calendar">
            <xsl:apply-templates select="//soumission" />
          </div>
          
          <!-- Bouton pour redirection vers la page index -->
          <button class="index-button" onclick="redirectToIndex()">Retour à l'accueil</button>
        </div>
        
        <script>
          function filterEvents() {
            var discipline = document.getElementById("disciplineFilter").value;
            var events = document.querySelectorAll(".event");
            
            events.forEach(function(event) {
              if (discipline === "" || event.classList.contains(discipline)) {
                event.style.display = "block";
              } else {
                event.style.display = "none";
              }
            });
          }
          
          function redirectToIndex() {
            // Modifier l'URL pour rediriger vers la page index
            window.location.href = "index.html";
          }
        </script>
      </body>
    </html>
  </xsl:template>
  
  <xsl:template match="soumission">
    <div class="day">
      
      <div class="events">
        <xsl:apply-templates select="." mode="events">
          <xsl:with-param name="presentationDate" select="date"/>
        </xsl:apply-templates>
      </div>
    </div>
  </xsl:template>
  
  <xsl:template match="soumission" mode="events">
    <xsl:param name="presentationDate"/>
    <xsl:variable name="index" select="position() - 1" />
    <xsl:variable name="startTimeHour" select="($index * 2 + 9) mod 24" />
    <xsl:variable name="endTimeHour" select="(($index + 1) * 2 + 9) mod 24" />
    <xsl:variable name="startTime" select="concat(format-number(floor($startTimeHour), '00'), ':00')" />
    <xsl:variable name="endTime" select="concat(format-number(floor($endTimeHour), '00'), ':00')" />
    
    <div class="event {discipline}">
      <div class="date">
        <xsl:value-of select="$presentationDate" />
      </div>
      <div class="event-time">
        <xsl:value-of select="concat($startTime, ' à ', $endTime)" />
      </div>
      <div class="event-title">
        <xsl:value-of select="concat(prenom, ' ', nom)"/>: <xsl:value-of select="title"/>
      </div>
      <div class="event-discipline">
        <xsl:value-of select="concat('Discipline: ', discipline)"/>
      </div>
      <div class="event-room">
        Salle: <xsl:value-of select="'Salle '"/> <xsl:value-of select="position()" />
      </div>
    </div>
  </xsl:template>
  
</xsl:stylesheet>
