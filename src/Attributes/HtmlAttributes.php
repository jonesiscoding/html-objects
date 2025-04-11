<?php

/**
 * HtmlAttributes.php
 */

namespace DevCoding\Html\Attributes;

/**
 * Represents an array of HTML5 Attributes for an HTML5 element, and contains convenience methods for output.
 *
 * @method string getAccept()
 * @method string getAcceptCharset()
 * @method string getAccesskey()
 * @method string getAction()
 * @method string getAlign()
 * @method string getAllow()
 * @method string getAlt()
 * @method string getAriaControls()
 * @method bool getAriaCurrent()
 * @method string getAriaHaspopup()
 * @method string getAriaLabel()
 * @method string getAriaLabelledby()
 * @method bool getAriaPressed()
 * @method bool getAriaSelected()
 * @method string getAriaSort()
 * @method string getAsync()
 * @method bool getAutocapitalize()
 * @method bool getAutocomplete()
 * @method string getAutofocus()
 * @method string getAutoplay()
 * @method string getBackground()
 * @method string getBgcolor()
 * @method string getBorder()
 * @method string getBuffered()
 * @method string getCapture()
 * @method string getChallenge()
 * @method string getCharset()
 * @method bool getChecked()
 * @method string getCite()
 * @method string getCode()
 * @method string getCodebase()
 * @method string getColor()
 * @method string getCols()
 * @method string getColspan()
 * @method string getContent()
 * @method string getContenteditable()
 * @method string getContextmenu()
 * @method string getControls()
 * @method string getCoords()
 * @method string getCrossorigin()
 * @method string getCsp()
 * @method string getData()
 * @method string getDatetime()
 * @method string getDecoding()
 * @method string getDefault()
 * @method string getDefer()
 * @method string getDir()
 * @method string getDirname()
 * @method bool getDisabled()
 * @method string getDownload()
 * @method bool getDraggable()
 * @method string getEnctype()
 * @method string getEnterkeyhint()
 * @method string getFor()
 * @method string getForm()
 * @method string getFormaction()
 * @method string getFormenctype()
 * @method string getFormmethod()
 * @method string getFormnovalidate()
 * @method string getFormtarget()
 * @method string getHeaders()
 * @method string getHeight()
 * @method string getHidden()
 * @method string getHigh()
 * @method string getHref()
 * @method string getHreflang()
 * @method string getHttpEquiv()
 * @method string getIcon()
 * @method string getId()
 * @method string getImportance()
 * @method string getIntegrity()
 * @method string getIntrinsicsize()
 * @method string getInputmode()
 * @method string getIsmap()
 * @method string getItemprop()
 * @method string getKeytype()
 * @method string getKind()
 * @method string getLabel()
 * @method string getLang()
 * @method string getLanguage()
 * @method string getLoading()
 * @method string getList()
 * @method string getLoop()
 * @method string getLow()
 * @method string getManifest()
 * @method string getMax()
 * @method string getMaxlength()
 * @method string getMinlength()
 * @method string getMedia()
 * @method string getMethod()
 * @method string getMin()
 * @method string getMultiple()
 * @method string getMuted()
 * @method string getName()
 * @method string getNovalidate()
 * @method string getOpen()
 * @method string getOptimum()
 * @method string getPattern()
 * @method string getPing()
 * @method string getPlaceholder()
 * @method string getPoster()
 * @method string getPreload()
 * @method string getRadiogroup()
 * @method bool getReadonly()
 * @method string getReferrerpolicy()
 * @method string getRel()
 * @method bool getRequired()
 * @method string getReversed()
 * @method string getRole()
 * @method string getRows()
 * @method string getRowspan()
 * @method string getSandbox()
 * @method string getScope()
 * @method string getScoped()
 * @method string getSelected()
 * @method string getShape()
 * @method string getSize()
 * @method string getSizes()
 * @method string getSlot()
 * @method string getSpan()
 * @method bool getSpellcheck()
 * @method string getSrc()
 * @method string getSrcdoc()
 * @method string getSrclang()
 * @method string getStart()
 * @method string getStep()
 * @method string getSummary()
 * @method string getTabindex()
 * @method string getTarget()
 * @method string getTitle()
 * @method string getTranslate()
 * @method string getType()
 * @method string getUsemap()
 * @method string getValue()
 * @method string getWidth()
 * @method string getWrap()
 * @method HtmlAttributes setAccept(string $value)
 * @method HtmlAttributes setAcceptCharset(string $value)
 * @method HtmlAttributes setAccesskey(string $value)
 * @method HtmlAttributes setAction(string $value)
 * @method HtmlAttributes setAlign(string $value)
 * @method HtmlAttributes setAllow(string $value)
 * @method HtmlAttributes setAriaControls(string $value)
 * @method HtmlAttributes setAriaCurrent(bool $value)
 * @method HtmlAttributes setAriaHaspopup(string $value)
 * @method HtmlAttributes setAriaLabel(string $value)
 * @method HtmlAttributes setAriaLabelledby(string $value)
 * @method HtmlAttributes setAriaPressed(bool $value)
 * @method HtmlAttributes setAriaSelected(bool $value)
 * @method HtmlAttributes setAriaSort(string $value);
 * @method HtmlAttributes setAlt(string $value)
 * @method HtmlAttributes setAsync(string $value)
 * @method HtmlAttributes setAutocapitalize(bool $value)
 * @method HtmlAttributes setAutocomplete(bool $value)
 * @method HtmlAttributes setAutofocus(string $value)
 * @method HtmlAttributes setAutoplay(string $value)
 * @method HtmlAttributes setBackground(string $value)
 * @method HtmlAttributes setBgcolor(string $value)
 * @method HtmlAttributes setBorder(string $value)
 * @method HtmlAttributes setBuffered(string $value)
 * @method HtmlAttributes setCapture(string $value)
 * @method HtmlAttributes setChallenge(string $value)
 * @method HtmlAttributes setCharset(string $value)
 * @method HtmlAttributes setChecked(bool $value)
 * @method HtmlAttributes setCite(string $value)
 * @method HtmlAttributes setCode(string $value)
 * @method HtmlAttributes setCodebase(string $value)
 * @method HtmlAttributes setColor(string $value)
 * @method HtmlAttributes setCols(string $value)
 * @method HtmlAttributes setColspan(string $value)
 * @method HtmlAttributes setContent(string $value)
 * @method HtmlAttributes setContenteditable(bool $value)
 * @method HtmlAttributes setContextmenu(string $value)
 * @method HtmlAttributes setControls(string $value)
 * @method HtmlAttributes setCoords(string $value)
 * @method HtmlAttributes setCrossorigin(string $value)
 * @method HtmlAttributes setCsp(string $value)
 * @method HtmlAttributes setData(string $value)
 * @method HtmlAttributes setDatetime(string $value)
 * @method HtmlAttributes setDecoding(string $value)
 * @method HtmlAttributes setDefault(string $value)
 * @method HtmlAttributes setDefer(string $value)
 * @method HtmlAttributes setDir(string $value)
 * @method HtmlAttributes setDirname(string $value)
 * @method HtmlAttributes setDisabled(bool $value)
 * @method HtmlAttributes setDownload(string $value)
 * @method HtmlAttributes setDraggable(bool $value)
 * @method HtmlAttributes setEnctype(string $value)
 * @method HtmlAttributes setEnterkeyhint(string $value)
 * @method HtmlAttributes setFor(string $value)
 * @method HtmlAttributes setForm(string $value)
 * @method HtmlAttributes setFormaction(string $value)
 * @method HtmlAttributes setFormenctype(string $value)
 * @method HtmlAttributes setFormmethod(string $value)
 * @method HtmlAttributes setFormnovalidate(string $value)
 * @method HtmlAttributes setFormtarget(string $value)
 * @method HtmlAttributes setHeaders(string $value)
 * @method HtmlAttributes setHeight(string $value)
 * @method HtmlAttributes setHidden(bool $value)
 * @method HtmlAttributes setHigh(string $value)
 * @method HtmlAttributes setHref(string $value)
 * @method HtmlAttributes setHreflang(string $value)
 * @method HtmlAttributes setHttpEquiv(string $value)
 * @method HtmlAttributes setIcon(string $value)
 * @method HtmlAttributes setId(string $value)
 * @method HtmlAttributes setImportance(string $value)
 * @method HtmlAttributes setIntegrity(string $value)
 * @method HtmlAttributes setIntrinsicsize(string $value)
 * @method HtmlAttributes setInputmode(string $value)
 * @method HtmlAttributes setIsmap(string $value)
 * @method HtmlAttributes setItemprop(string $value)
 * @method HtmlAttributes setKeytype(string $value)
 * @method HtmlAttributes setKind(string $value)
 * @method HtmlAttributes setLabel(string $value)
 * @method HtmlAttributes setLang(string $value)
 * @method HtmlAttributes setLanguage(string $value)
 * @method HtmlAttributes setLoading(string $value)
 * @method HtmlAttributes setList(string $value)
 * @method HtmlAttributes setLoop(string $value)
 * @method HtmlAttributes setLow(string $value)
 * @method HtmlAttributes setManifest(string $value)
 * @method HtmlAttributes setMax(string $value)
 * @method HtmlAttributes setMaxlength(string $value)
 * @method HtmlAttributes setMinlength(string $value)
 * @method HtmlAttributes setMedia(string $value)
 * @method HtmlAttributes setMethod(string $value)
 * @method HtmlAttributes setMin(string $value)
 * @method HtmlAttributes setMultiple(string $value)
 * @method HtmlAttributes setMuted(string $value)
 * @method HtmlAttributes setName(string $value)
 * @method HtmlAttributes setNovalidate(string $value)
 * @method HtmlAttributes setOpen(string $value)
 * @method HtmlAttributes setOptimum(string $value)
 * @method HtmlAttributes setPattern(string $value)
 * @method HtmlAttributes setPing(string $value)
 * @method HtmlAttributes setPlaceholder(string $value)
 * @method HtmlAttributes setPoster(string $value)
 * @method HtmlAttributes setPreload(string $value)
 * @method HtmlAttributes setRadiogroup(string $value)
 * @method HtmlAttributes setReadonly(string $value)
 * @method HtmlAttributes setReferrerpolicy(string $value)
 * @method HtmlAttributes setRel(string $value)
 * @method HtmlAttributes setRequired(bool $value)
 * @method HtmlAttributes setReversed(string $value)
 * @method HtmlAttributes setRole(string $value)
 * @method HtmlAttributes setRows(string $value)
 * @method HtmlAttributes setRowspan(string $value)
 * @method HtmlAttributes setSandbox(string $value)
 * @method HtmlAttributes setScope(string $value)
 * @method HtmlAttributes setScoped(string $value)
 * @method HtmlAttributes setSelected(string $value)
 * @method HtmlAttributes setShape(string $value)
 * @method HtmlAttributes setSize(string $value)
 * @method HtmlAttributes setSizes(string $value)
 * @method HtmlAttributes setSlot(string $value)
 * @method HtmlAttributes setSpan(string $value)
 * @method HtmlAttributes setSpellcheck(bool $value)
 * @method HtmlAttributes setSrc(string $value)
 * @method HtmlAttributes setSrcdoc(string $value)
 * @method HtmlAttributes setSrclang(string $value)
 * @method HtmlAttributes setSrcset(string $value)
 * @method HtmlAttributes setStart(string $value)
 * @method HtmlAttributes setStep(string $value)
 * @method HtmlAttributes setSummary(string $value)
 * @method HtmlAttributes setTabindex(string $value)
 * @method HtmlAttributes setTarget(string $value)
 * @method HtmlAttributes setTitle(string $value)
 * @method HtmlAttributes setTranslate(string $value)
 * @method HtmlAttributes setType(string $value)
 * @method HtmlAttributes setUsemap(string $value)
 * @method HtmlAttributes setValue(string $value)
 * @method HtmlAttributes setWidth(string $value)
 * @method HtmlAttributes setWrap(string $value)
 */
class HtmlAttributes implements ValueObjectInterface, \Stringable
{
  const SPECIAL = [
      ActionAttribute::class,
      BackgroundAttribute::class,
      CiteAttribute::class,
      ClassAttribute::class,
      ClassIdAttribute::class,
      CodeBaseAttribute::class,
      DataAttribute::class,
      FormActionAttribute::class,
      HrefAttribute::class,
      IdAttribute::class,
      IconAttribute::class,
      LinkAttribute::class,
      LongDescAttrribute::class,
      PosterAttribute::class,
      ProfileAttribute::class,
      SrcAttribute::class,
      SrcSetAttribute::class,
      StyleAttribute::class,
      UseMapAttribute::class
  ];

  /** @var string[] */
  protected array $special = [];
  /** @var string[]|ObjectAttributeInterface[]  */
  protected $_data = [];

  // region //////////////////////////////////////////////// Instantiation Methods

  /**
   * Constructor that uses the 'set' method to ensure that the correct setter is used for the given data.
   *
   * @param array $data Array of attribute => value. Values must be boolean/scalar unless an explicit setter exists.
   *
   * @throws \Exception If given a non-scalar, non-boolean value
   */
  public function __construct(array $data, array $special = [])
  {
    $special = empty($special) ? self::SPECIAL : $special;
    foreach($special as $class)
    {
      if ($class instanceof ObjectAttributeInterface)
      {
        $this->special[$class->getName()] = $class;
      }
    }

    foreach($data as $key => $value)
    {
      $this->set($key, $value);
    }
  }

  // endregion ///////////////////////////////////////////// End Instantiation Methods

  // region //////////////////////////////////////////////// Getter/Setter Methods

  /**
   * Allows for getX, setX, and hasX methods for all HTML5 attribute properties, if the property does not have its own
   * methods within this class.
   *
   * @param string $name
   * @param array  $arguments
   *
   * @return HtmlAttributes|ObjectAttributeInterface|string|bool|null
   * @throws \Exception     If a setter method is called with a non-scalar, non-boolean value
   */
  public function __call($name, $arguments)
  {
    if(preg_match('/^(has|get|set)(data|aria)?(.*)$/i', $name, $m))
    {
      $prefix   = strtolower($m[ 1 ]);
      $property = (!empty($m[ 2 ])) ? strtolower($m[ 2 ] . '-' . $m[ 3 ]) : strtolower($m[ 3 ]);

      if("get" === $prefix)
      {
        return $this->get($property);
      }
      elseif('has' === $prefix)
      {
        return $this->has($property);
      }
      elseif('set' === $prefix)
      {
        $arg = reset($arguments);

        return $this->set($property, $arg);
      }
    }

    throw new \BadMethodCallException(sprintf('The method %s does not exist in %s.', $name, __CLASS__));
  }

  /**
   * Returns the attribute value for the given key.  This value is raw, and not normalized.
   *
   * @param string $key
   *
   * @return ObjectAttributeInterface|string|null
   * @noinspection PhpReturnDocTypeMismatchInspection
   */
  public function get(string $key)
  {
    return (array_key_exists($key, $this->_data)) ? $this->_data[ $key ] : null;
  }

  /**
   * Returns the CSS class attribute as an array or string.
   *
   * @param bool $asString
   *
   * @return ClassAttribute|string|null
   */
  public function getClass(bool $asString = false)
  {
    if($classes = $this->get(StyleAttribute::class))
    {
      if ($classes instanceof ClassAttribute)
      {
        return ($asString) ? (string) $classes : $classes;
      }
    }

    return null;
  }

  /**
   * @param bool $asString
   *
   * @return SrcSetAttribute|string|null
   */
  public function getSrcSet(bool $asString = false)
  {
    if($srcset = $this->get(SrcSetAttribute::getName()))
    {
      if ($srcset instanceof SrcSetAttribute)
      {
        return $asString ? (string) $srcset : $srcset;
      }
    }

    return null;
  }

  /**
   * Returns the style attribute as an associative array or a string.
   *
   * @param bool $asString
   *
   * @return StyleAttribute|string|null
   */
  public function getStyle(bool $asString = false)
  {
    if($styles = $this->get(StyleAttribute::getName()))
    {
      if ($styles instanceof StyleAttribute)
      {
        return $asString ? (string) $styles : $styles;
      }
    }

    return null;
  }

  /**
   * Indicates whether the attribute value is set for the given key.
   *
   * @param string $key
   *
   * @return bool
   */
  public function has(string $key)
  {
    return (array_key_exists($key, $this->_data) && !is_null($this->_data[ $key ]));
  }

  /**
   * Sets the given attribute to the given value, after validating that the value is scalar, boolean, or null.
   *
   * @param string $key
   * @param string|int|float|bool|null $value
   *
   * @uses   setStyle,setClass
   * @return $this
   * @throws \InvalidArgumentException
   */
  public function set($key, $value)
  {
    if (isset($this->special[$key]))
    {
      if (is_null($value))
      {
        $this->_data[ $key ] = $value;
      }
      else
      {
        $this->_data[$key] = new $this->special[$key]($value);
      }
    }
    elseif(!$value instanceof \Stringable && !is_scalar($value) && !is_bool($value) && !is_null($value))
    {
      throw new \InvalidArgumentException(sprintf('Only scalar, boolean, and NULL values may be set as values for the HTML5 attribute "%s"', $key));
    }

    $this->_data[ strtolower($key) ] = $value;

    return $this;
  }

  /**
   * Sets the class attribute, overriding any previous value.
   *
   * @param array|string $class
   *
   * @return $this
   */
  public function setClass($class)
  {
    $key = ClassAttribute::getName();
    if ($class instanceof ClassAttribute)
    {
      $this->_data[$key] = $class;
    }
    else
    {
      $this->_data[$key] = new ClassAttribute($class);
    }

    return $this;
  }

  /**
   * Sets the style attribute using the given string or array.
   *
   * Array should be in the format of CSS property => CSS value.
   *
   * Strings are parsed to determine the CSS rules within.  Each rule must have the trailing semicolon.
   *
   * @param string|array $style
   *
   * @return $this
   */
  public function setStyle($style)
  {
    $key = StyleAttribute::getName();
    if ($style instanceof StyleAttribute)
    {
      $this->_data[$key] = $style;
    }
    else
    {
      $this->_data[$key] = new StyleAttribute($style);
    }

    return $this;
  }

  /**
   * Compares the given value to this object to determine if they are equal.  Order of elements, CSS classes, or
   * CSS style rules does not matter for the purposes of this comparison.
   *
   * @param HtmlAttributes|array $compare
   *
   * @return bool
   */
  public function equals($compare): bool
  {
    // If we're given an array, attempt to convert it to an object for comparison.
    // If that isn't possible, return false
    if(!$compare instanceof HtmlAttributes && is_array($compare))
    {
      try
      {
        $compare = new HtmlAttributes($compare, $this->special);
      }
      catch(\Exception $e)
      {
        return false;
      }
    }

    // If we now have an object, run a comparison
    if($compare instanceof HtmlAttributes)
    {
      foreach($this->_data as $key => $value)
      {
        if(!$compare->has($key))
        {
          return false;
        }
        else
        {
          $cValue = $compare->get($key);
          if ($value instanceof ListAttribute)
          {
            if (!$cValue instanceof ListAttribute)
            {
              return false;
            }

            // We just want to make sure we have the same values in the arrays
            $diff = array_diff($value->all(), $cValue->all());

            if (!empty($diff))
            {
              return false;
            }
          }
          elseif ($value instanceof MapAttribute)
          {
            if (!$cValue instanceof MapAttribute)
            {
              return false;
            }

            // We want to make sure we have the same key & value pairs.
            $diff = array_diff_assoc($value->all(), $cValue->all());

            if (!empty($diff))
            {
              return false;
            }
          }
          elseif ($value instanceof ObjectAttributeInterface)
          {
            return (string) $value === (string) $compare;
          }
        }
      }

      return true;
    }

    return false;
  }

  /**
   * @return string
   */
  public function __toString(): string
  {
    $final = [];
    $attr  = $this->getArrayCopy();
    $tmpl  = '%s="%s"';

    foreach($attr as $key => $value)
    {
      if ($value instanceof ClassAttribute)
      {
        $final[] = sprintf($tmpl, $key, (string) $value);
      }
      elseif ($value instanceof StyleAttribute)
      {
        $final[] = sprintf($tmpl, $key, (string) $value);
      }
      else
      {
        $final[] = sprintf($tmpl, $key, $value);
      }
    }

    return implode(' ', $final);
  }

  /**
   * Returns the attributes an array, with the values normalized to strings and any null values
   * removed, so that they are suitable for output.
   *
   * @return array
   */
  public function getArrayCopy()
  {
    return $this->removeNullKeys($this->getNormalized($this->_data));
  }

  // region //////////////////////////////////////////////// Helper Methods

  /**
   * Normalizes the values of the given array for output as HTML5 attributes by converting numeric
   * and boolean values to strings.
   *
   * @param array $arr
   *
   * @return array
   */
  protected function getNormalized($arr)
  {
    foreach($arr as $key => $value)
    {
      if (is_bool($value))
      {
        $arr[$key] = (string) (new BooleanObject($value));
      }
      elseif(is_int($value) || is_float($value))
      {
        $arr[ $key ] = (string) $value;
      }
    }

    return $arr;
  }

  /**
   * Removes values that are null from the given array so that they may be omitted from output.
   *
   * @param array $arr
   *
   * @return array
   */
  protected function removeNullKeys($arr)
  {
    foreach($arr as $key => $value)
    {
      if(is_null($value))
      {
        unset($arr[ $key ]);
      }
    }

    return $arr;
  }

  // endregion ///////////////////////////////////////////// End Helper Methods
}
