<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:mets="http://www.loc.gov/METS/" xmlns:xfdu="urn:ccsds:schema:xfdu:1"
    xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
    xmlns:premis="info:lc/xmlns/premis-v2"
    version="2.0">
    
    <!--
        informationPackageMap templates
        maps to mets:structMap
        
        todo: non-desc metadata types
    -->
    
    <xsl:template match="informationPackageMap">
        <mets:structMap>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./packageType != ''">
                <xsl:attribute name="TYPE">
                    <xsl:apply-templates select="./@packageType"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./textInfo != ''">
                <xsl:attribute name="LABEL">
                    <xsl:apply-templates select="./@textInfo"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:apply-templates/>
        </mets:structMap>
    </xsl:template>
    
    <xsl:template match="xfdu:contentUnit">
        <mets:div>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@order != ''">
                <xsl:attribute name="ORDER">
                    <xsl:apply-templates select="./@order"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@unitType != ''">
                <xsl:attribute name="TYPE">
                    <xsl:apply-templates select="./@unitType"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@textInfo != ''">
                <xsl:attribute name="LABEL">
                    <xsl:apply-templates select="./@textInfo"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@dmdID != ''">
                <xsl:attribute name="DMDID">
                    <xsl:apply-templates select="./@dmdID"/>
                </xsl:attribute>
            </xsl:if>
            <!--
                mapping for other metadata types will vary
                category types map, content models differ
            -->
            <xsl:apply-templates/>
        </mets:div>
    </xsl:template>
    
    <xsl:template match="XFDUPointer">
        <mets:mptr xmlns:xlink="http://www.w3.org/1999/xlink">
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
        </mets:mptr>
    </xsl:template>
    
    <xsl:template match="dataObjectPointer">
        <mets:fptr>
            <xsl:if test="./@ID != ''">
                <xsl:attribute name="ID">
                    <xsl:apply-templates select="./@ID"/>
                </xsl:attribute>
            </xsl:if>
            <xsl:if test="./@dataObjectID != ''">
                <xsl:attribute name="FILEID">
                    <xsl:apply-templates select="./@dataObjectID"/>
                </xsl:attribute>
            </xsl:if>
        </mets:fptr>
    </xsl:template>
    
    
</xsl:stylesheet>