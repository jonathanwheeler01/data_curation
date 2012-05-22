<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:mets="http://www.loc.gov/METS/" xmlns:xfdu="urn:ccsds:schema:xfdu:1"
    xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
    xmlns:premis="info:lc/xmlns/premis-v2" version="2.0">
    <!-- 
        to METS from XFDU
    -->
    <xsl:strip-space elements="*"/>

    <xsl:template match="/">
        <mets:mets xmlns:mets="http://www.loc.gov/METS/"
            xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xsi:schemaLocation="http://www.loc.gov/METS/ http://www.loc.gov/standards/mets/mets.xsd">
            
            <xsl:apply-templates select="xfdu:XFDU/informationPackageMap"/>
            
        </mets:mets>
    </xsl:template>

    <!--
        informationPackageMap templates
        some conditional handling required
    -->

    <xsl:template match="informationPackageMap">
        <mets:structMap>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
            <xsl:attribute name="TYPE">
                <xsl:apply-templates select="./@packageType"/>
            </xsl:attribute>
            <xsl:attribute name="LABEL">
                <xsl:apply-templates select="./@textInfo"/>
            </xsl:attribute>
            <xsl:apply-templates/>
        </mets:structMap>
    </xsl:template>

    <xsl:template match="xfdu:contentUnit">
        <mets:div>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
            <xsl:attribute name="ORDER">
                <xsl:apply-templates select="./@order"/>
            </xsl:attribute>
            <xsl:attribute name="TYPE">
                <xsl:apply-templates select="./@unitType"/>
            </xsl:attribute>
            <xsl:attribute name="LABEL">
                <xsl:apply-templates select="./@textInfo"/>
            </xsl:attribute>
            <xsl:attribute name="DMDID">
                <xsl:apply-templates select="./@dmdID"/>
            </xsl:attribute>
            <!--
                mapping for other metadata types will vary
            -->
            <xsl:apply-templates/>
        </mets:div>
    </xsl:template>
    
    <xsl:template match="XFDUPointer">
        <mets:mptr>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
        </mets:mptr>
    </xsl:template>

    <xsl:template match="dataObjectPointer">
        <mets:fptr>
            <xsl:attribute name="ID">
                <xsl:apply-templates select="./@ID"/>
            </xsl:attribute>
            <xsl:attribute name="FILEID">
                <xsl:apply-templates select="./@dataObjectID"/>
            </xsl:attribute>
        </mets:fptr>
    </xsl:template>

</xsl:stylesheet>
