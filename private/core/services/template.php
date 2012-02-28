<?php
/**
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * Qubit is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See theGNU General Public License for more details.
 * --------------------------------------------------------------------------------------------------------------------
 * @copyright  Copyright (c) 2011 - 2012 Robot United (http://www.robotunited.com)
 * @license    http://www.gnu.org/licenses/gpl.html  GPL License
 * @version    0.0.1
 * @link       http://www.robotunited.com/open_source/qubit
 * @since      Version 0.0.1
 * --------------------------------------------------------------------------------------------------------------------
 */

/**
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit Template Class
 * --------------------------------------------------------------------------------------------------------------------
 * Assigns variables to the template object.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    core
 * @subpackage  template
 * --------------------------------------------------------------------------------------------------------------------
 */
class core_services_template
{
    /**
     *
     * @var array
     */
    private $data = array();

    /**
     * Class Constructor
     *
     * Creates template and template_path objects.
     * Loads helper functions if available.
     *
     * @param string $template
     */
	public function __construct($template)
    {
		$this->template = $template;
		$this->template_path = $this->setPath();
        $this->loadHelper();
	}

    /**
     * Assign Variable
     *
     * @param string $variable
     * @param mixed $value
     */
    public function assignVariable($variable, $value = NULL)
    {
        $this->$variable = $value;
    }

    /**
     * Get Template File
     *
     * Loads the requested $file template.
     *
     * @param string $file
     */
	public function getTemplateFile($file)
    {
        if (file_exists($this->template_path . DS . $file)) {
            require $this->template_path . DS . $file;
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Load Helper
     *
     * Loads the helper functions file if it exists.
     *
     * @return bool
     */
    public function loadHelper()
    {
        $helper = $this->template_path . DS . 'helpers' . DS . 'template.helper.php';

        if (file_exists($helper)) {
            require $helper;
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Read Template File
     *
     * Returns the contents of $file.
     *
     * @return false|string
     */
    public function readTemplateFile($file)
    {
        if (file_exists($this->template_path . DS . $file)) {
            $content = file_get_contents($this->template_path . DS . $file);
            return $content;
        }
		return FALSE;
    }

    /**
     * Set Path
     *
     * Returns the path of the template directory if it exists.
     *
     * @return bool|string
     */
	protected function setPath()
    {
		if (is_dir(Q_PUBLIC_DIR . DS . 'templates' . DS . $this->template)) {
			return Q_PUBLIC_DIR . DS . 'templates' . DS . $this->template;
		}
		return FALSE;
    }

    /**
     * Setter
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Getter
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }
}