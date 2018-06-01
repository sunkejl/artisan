<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output encoding='ISO-8859-1'/>
<xsl:output method='html' indent='yes' media-type='text/xhtml'/>

<xsl:template match="rdf">
<html>
<head>
  <title><xsl:value-of select="channel/title"/></title>
</head>
<body>
  <xsl:apply-templates/>
</body>
</html>
</xsl:template>

<xsl:template match="channel">
  <h1><xsl:value-of select="title"/></h1>
  <p><xsl:value-of select="description"/></p>
  <xsl:apply-templates select="items"/>
</xsl:template>

<xsl:template match="Seq">
  <ul>
    <xsl:apply-templates />
  </ul>
</xsl:template>

<xsl:key name="l" match="item" use="@about"/>

<xsl:template match="li">
  <li>
    <a href="#{generate-id(key('l',@resource))}"><xsl:value-of select="key('l',@resource)/title"/></a>
  </li>
</xsl:template>

<xsl:template match="item">
<hr />
<a name="{generate-id()}">
  <h2><xsl:value-of select="title"/></h2>
  <p>
    <xsl:value-of select="description"/>
  </p>
  <p>
    <xsl:element name="a">
      <xsl:attribute name="href"><xsl:value-of select="link"/></xsl:attribute>
      <xsl:text>[more]</xsl:text>
    </xsl:element>
  </p>
</a>
</xsl:template>

</xsl:stylesheet>
