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

    <xsl:template match="/">
        <mets:mets xmlns:mets="http://www.loc.gov/METS/"
            xmlns:dc="http://dublincore.org/schemas/xmls/qdc/2008/02/11/dcterms.xsd"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xsi:schemaLocation="http://www.loc.gov/METS/ http://www.loc.gov/standards/mets/mets.xsd">

            <xsl:apply-templates select="xfdu:XFDU/dataObjectSection"/>
            <xsl:apply-templates select="xfdu:XFDU/informationPackageMap"/>

        </mets:mets>
    </xsl:template>

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
