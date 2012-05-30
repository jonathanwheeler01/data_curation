<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:mets="http://www.loc.gov/METS/" xmlns:xfdu="urn:ccsds:schema:xfdu:1"
    xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
    xmlns:premis="info:lc/xmlns/premis-v2" version="2.0">
    <!-- 
        to METS from XFDU
        author: Jon Wheeler
    -->
    <xsl:strip-space elements="*"/>
    <xsl:include href="structMap_informationPackageMap.xsl"/>
    <xsl:include href="file_dataObject.xsl"/>

    <xsl:template match="/">
        <mets:mets xmlns:mets="http://www.loc.gov/METS/"
            xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xsi:schemaLocation="http://www.loc.gov/METS/ http://www.loc.gov/standards/mets/mets.xsd">

            <xsl:apply-templates select="xfdu:XFDU/dataObjectSection"/>
            <xsl:apply-templates select="xfdu:XFDU/informationPackageMap"/>
            <xsl:apply-templates select="xfdu:XFDU/behaviorSection"/>

        </mets:mets>
    </xsl:template>

    <!--
        
        mets behaviorSec to xfdu behaviorSection map
        
    -->

    <xsl:template match="behaviorSection">
        <mets:behaviorSec>
            <xsl:apply-templates/>
        </mets:behaviorSec>
    </xsl:template>

    <xsl:template match="behaviorObject">
        <mets:behavior>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@created != ''">
                <xsl:attribute name="CREATED">
                    <xsl:apply-templates select="./@created"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@textInfo != ''">
                <xsl:attribute name="LABEL">
                    <xsl:apply-templates select="./@textInfo"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@behaviorType != ''">
                <xsl:attribute name="BTYPE">
                    <xsl:apply-templates select="./@behaviorType"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@contentUnitID != ''">
                <xsl:attribute name="STRUCTID">
                    <xsl:apply-templates select="./@contentUnitID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:apply-templates/>
        </mets:behavior>
    </xsl:template>
    
    <xsl:template match="interfaceDefinition">
        <mets:interfaceDef xmlns:xlink="http://www.w3.org/1999/xlink">
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@textInfo != ''">
                <xsl:attribute name="LABEL">
                    <xsl:apply-templates select="./@textInfo"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@locatorType != ''">
                <xsl:attribute name="LOCTYPE">
                    <xsl:apply-templates select="./@locatorType"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@href != ''">
                <xsl:attribute name="xlink:href">
                    <xsl:apply-templates select="./@href"/>
                </xsl:attribute>
            </xsl:if>
        </mets:interfaceDef>
    </xsl:template>
    
    <xsl:template match="inputParameter"/>
    
    <xsl:template match="dataObjectPointer"/>

</xsl:stylesheet>
