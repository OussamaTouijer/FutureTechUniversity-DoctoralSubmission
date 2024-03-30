<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <!-- Utilisation de la méthode Muenchian pour regrouper les soumissions par filière -->
  <xsl:key name="filiere" match="soumission" use="discipline"/>

  <!-- Template principal -->
  <xsl:template match="/">
    <html>
      <head>
        <title>Calendrier des soumissions</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
          }
          h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
          }
          h2 {
            color: #444;
          }
          table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
          }
          th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
            font-weight: bold;
          }
          td {
            background-color: #fff;
          }
        </style>
      </head>
      <body>
        <h1>Calendrier des soumissions</h1>
        <!-- Application des templates pour chaque filière -->
        <xsl:apply-templates select="//soumission[generate-id() = generate-id(key('filiere', discipline)[1])]" mode="filiere"/>
        
        <!-- Bouton de retour vers la page d'accueil -->
        <button onclick="window.location.href = 'index.html';">Retour vers la page d'accueil</button>
      </body>
    </html>
  </xsl:template>

  <!-- Template pour chaque filière -->
  <xsl:template match="soumission" mode="filiere">
    <xsl:variable name="filiere_name" select="discipline"/>
    <h2><xsl:value-of select="$filiere_name"/></h2>
    <!-- Création du tableau pour afficher les rendez-vous -->
    <table>
      <tr>
        <th>Date de soumission</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Titre</th>
        <th>Superviseur</th>
      </tr>
      <!-- Application des templates pour chaque soumission de la filière -->
      <xsl:for-each select="key('filiere', $filiere_name)">
        <tr>
          <!-- Transformer le code de soumission en date -->
          <xsl:variable name="date" select="substring(substring-after(code, ' '), 1, 10)"/>

          <!-- Afficher la date exacte -->
          <td><xsl:value-of select="$date"/></td>
          <td><xsl:value-of select="nom"/></td>
          <td><xsl:value-of select="prenom"/></td>
          <td><xsl:value-of select="title"/></td>
          <td><xsl:value-of select="supervisor/supervisor_name"/></td>
        </tr>
      </xsl:for-each>
    </table>
    <!-- Ajout d'une salle pour chaque filière -->
    <p>Salle pour la filière : <xsl:value-of select="concat('Salle ', position())"/></p>
  </xsl:template>

</xsl:stylesheet>
