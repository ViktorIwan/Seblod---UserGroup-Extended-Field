<?php
/**
* @version 			SEBLOD 3.x Core
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2009 - 2016 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;
$lang = JFactory::getLanguage();
$extension = 'plg_cck_field_dx_usergroups_ext';
$base_dir = dirname(__FILE__)."/../";
$language_tag = $lang->getTag();
$reload = true;
$lang->load($extension, $base_dir, $language_tag, $reload);
$options2	=	JCckDev::fromJSON( $this->item->options2 );
?>

<div class="seblod">
    <?php echo JCckDev::renderLegend( JText::_( 'COM_CCK_CONSTRUCTION' ), JText::_( 'PLG_CCK_FIELD_'.$this->item->type.'_DESC' ) ); ?>
    <ul class="adminformlist adminformlist-2cols">
        <?php
        echo JCckDev::renderForm( 'core_label', $this->item->label, $config );
        echo JCckDev::renderForm( 'core_defaultvalue', $this->item->defaultvalue, $config );
//        echo JCckDev::renderForm( 'core_defaultvalue', @$options2['ugparentID'],  $config, array('label'=>'Parent User ID','storage_field'=>'json[options2][ugparentID]' ) );
        $form= JHtml::_( 'access.usergroup', "json[options2][ugparentID]", @$options2['ugparentID']);
        echo "<li><label>".jText::_('Parent User ID')."</label>";
        echo $form;
        echo "</li>";

        echo JCckDev::renderForm( 'core_bool3', $this->item->bool3, $config, array( 'label'=>'Display Type', 'options'=>'Checkbox=0||Dropdown=1' ) );
        echo JCckDev::renderForm( 'core_bool4', $this->item->bool4, $config, array( 'label'=>'Include Parent', 'options'=>'Yes=1||No=0' ) );

        echo JCckDev::renderSpacer( JText::_( 'COM_CCK_STORAGE' ), JText::_( 'COM_CCK_STORAGE_DESC' ) );
		echo JCckDev::getForm( 'core_storage', $this->item->storage, $config );
        ?>
    </ul>
</div>
