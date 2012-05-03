
package java_data_curation.schema;

import java.util.HashMap;

import org.w3c.dom.*;

import javax.xml.parsers.*;

/**
 *
 * @author Robert Olendorf
 */
abstract public class aXMLElement {
  /**
   * Specifies the XML version used.
   */
  protected String XMLVersion = "1.0";
  
  /**
   * Specifies the Encoding standard to be used.
   */
  protected String XMLEncoding = "UTF-8";
  
 /**
   * The name of the element
   */
  protected String elementName;
  
  /**
   * The value of the element.
   */
  protected String elementValue;
  
  /**
   * Namespaces are indexed by their name, the value being an instance of
   * XMLNamespace.
   */
  protected HashMap<String, XMLNamespace> namespaces;
  
  /**
   * Element attributes indexed by the attribute name and the value of the attribute
   * as the value.
   */
  protected HashMap<String, XMLAttribute> attributes;
  
  /**
   * 
   */
  public aXMLElement(String name) {
    this.elementName = name;
    this.attributes = new HashMap<String, XMLAttribute>();
    this.namespaces = new HashMap<String, XMLNamespace>();
  }
  
  /**
   * Gets the element as a DOM <code>Element</code>. The implemented method should
   * call <code>get_as_DOM()</code> on all child elements. Additionally, check should be made
   * for required elements.
   * @return The Dom element, and any child elements. 
   */
  abstract public Element getAsDOM() throws ParserConfigurationException;
 
  /**
   * 
   * @param XMLVersion The version of XML to be used
   */
  public aXMLElement setXMLVersion(String XMLVersion) {
    this.XMLVersion = XMLVersion;
    return this;
  }
  
  /**
   * 
   * @return the version of XML being used.
   */
  public String getXMLVersion() {
    return this.XMLVersion;
  }
  
  /**
   * 
   * @param XMLEncoding The encoding used.
   */
  public aXMLElement setXMLEncoding(String XMLEncoding) {
    this.XMLEncoding = XMLEncoding;
    return this;
  }
  
  /**
   * 
   * @return 
   */
  public String getXMLEncoding() {
    return this.XMLEncoding;
  }
  
  /**
   * 
   * @param value The value of the element.
   * @return 
   */
  public aXMLElement setElementValue(String value) {
    this.elementValue = value;
    return this;
  }
  
  /**
   * 
   * @return 
   */
  public aXMLElement clearElementValue() {
    this.elementValue = null;
    return this;
  }
  
  /**
   * 
   * @return 
   */
  public String getElementValue() {
    return this.elementValue;
  }
  
  /**
   * 
   * @param name a name of the <code>XMLNamespace</code>
   * @param namespace an <code>XMLNamespace</code> for the element
   */
  public aXMLElement addNamespace(String name, XMLNamespace namespace) {
    this.namespaces.put(name, namespace);
    return this;
  }
  
  /**
   * Gets the requested <code>XMLNamespace</code> from the list.
   * @param name the name of the <code>XMLNamespace</code> to be retrieved.
   * @return the requested <code>XMLNamespace</code>
   */
  public XMLNamespace getNamespace(String name) {
    return this.namespaces.get(name);
  }
  
  /**
   * Removes the specified <code>XMLNamespace</code> from the list
   * @param name the name of the <code>XMLNamespace</code> to remove
   */
  public aXMLElement removeNamespace(String name) {
    this.namespaces.remove(name);
    return this;
  }
  
  /**
   * 
   */
  public aXMLElement clearNamespaces() {
    this.namespaces.clear();
    return this;
  }
  
  /**
   * 
   * @return Returns true if <code>namespaces</code> is empty, false otherwise.
   */
  public boolean isEmptyNamespaces() {
    return this.namespaces.isEmpty();
  }
  
  /**
   * 
   * @param name the name of the <code>XMLNamespace</code> to be retrieved
   * @return true if the <code>XMLNamespace</code> exists in th element.
   */
  public boolean hasNamespace(String name) {
    return this.namespaces.containsKey(name);
  }
  
  /**
   * 
   * @param name
   * @param value
   * @param namespaceURI
   * @return 
   */
  public aXMLElement addAttribute(String name, String value, String namespaceURI) {
    XMLAttribute attribute = new XMLAttribute();
    attribute.attributeName = name;
    attribute.attributeValue = value;
    attribute.namespaceURI = namespaceURI;
    this.attributes.put(name, attribute);
    return this;
  }
  
  /**
   * Add an attribute to the element. If the element is qualified (prefixed)
   * that must be done as well, e.g. dc:creator.
   * @param name The name of the attribute.
   * @param value The value of the attribute.
   */
  public aXMLElement addAttribute(String name, String value) {
    XMLAttribute attribute = new XMLAttribute();
    attribute.attributeName = name;
    attribute.attributeValue = value;
    this.attributes.put(name, attribute);
    return this;
  }
  
  /**
   * Returns the value of the attribute with the specified name or <code>null</code>
   * if it the key does not exist.
   * @param name
   * @return 
   */
  public String getAttributeValue(String name) {
    return this.attributes.get(name).attributeValue;
  }
  
  /**
   * Removes the attribute if present.
   * @param name the name of the attribute.
   */
  public aXMLElement removeAttribute(String name) {
    this.attributes.remove(name);
    return this;
  }
  
  /**
   * 
   */
  public aXMLElement clearAttibutes() {
    this.attributes.clear();
    return this;
  }
  
  /**
   * Returns true if no attributes have been set, false otherwise.
   * @return 
   */
  public boolean isEmptyAttributes() {
    return this.attributes.isEmpty();
  }
  
  /**
   * Returns true if the attribute has been set, false otherwise.
   * @param name the name of the attribute.
   * @return 
   */
  public boolean hasAttribute(String name) {
    return this.attributes.containsKey(name);
  }
  
  
  
}
