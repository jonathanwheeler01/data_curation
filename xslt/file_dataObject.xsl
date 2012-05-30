<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:mets="http://www.loc.gov/METS/" xmlns:xfdu="urn:ccsds:schema:xfdu:1"
    xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
    xmlns:premis="info:lc/xmlns/premis-v2" version="2.0">
    
    <!--
        dataObjectSection templates
        maps to mets:fileSec
        
        current mapping below dataObject 
        seems implementation specific
    -->
    
    <xsl:template match="dataObjectSection">
        <mets:fileSec>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <!--
                xfdu dataObject equivalent to mets file
                mets fileGrp included because required
            -->
            <mets:fileGrp>
                <xsl:apply-templates/>
            </mets:fileGrp>
        </mets:fileSec>
    </xsl:template>
    
    <xsl:template match="dataObject">
        <mets:file>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="descendant::byteStream/@mimeType != ''">
                <xsl:attribute name="MIMETYPE">
                    <xsl:apply-templates select="descendant::byteStream/@mimeType"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="descendant::byteStream/@size != ''">
                <xsl:attribute name="SIZE">
                    <xsl:apply-templates select="descendant::byteStream/@size"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="descendant::checksum">
                <xsl:attribute name="CHECKSUMTYPE">
                    <xsl:apply-templates select="descendant::checksum/@checksumName"/>
                </xsl:attribute>
                <xsl:attribute name="CHECKSUM">
                    <xsl:apply-templates select="descendant::checksum"/>
                </xsl:attribute>
            </xsl:if>
            <!--
                may need to process other nodes, but also need to exclude
                checksum content
            -->
            <xsl:apply-templates select=".//fileLocation"/>
        </mets:file>
    </xsl:template>
    
    <xsl:template match="fileLocation">
        <mets:FLocat xmlns:xlink="http://www.w3.org/1999/xlink">
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
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
        </mets:FLocat>
    </xsl:template>
    
</xsl:stylesheet>