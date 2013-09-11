<?php
/** Created by griga at 23.05.13 | 17:44.
 *
 */
require_once('Chosen.php');

class TbChosen extends Chosen
{
	public static function activeMultiSelect($model, $attribute, $data, $htmlOptions = array())
	{
		$out = CHtml::openTag('div', array('class' => 'control-group'));
		$out .= CHtml::activeLabelEx($model, $attribute, array('class'=>'control-label'));
		$out .= CHtml::openTag('div', array('class' => 'controls'));
		$out .= parent::activeMultiSelect($model, $attribute, $data, $htmlOptions);
		$out .= CHtml::closeTag('div');
		$out .= CHtml::closeTag('div');
		return $out;
	}

	public static function activeDropDownList($model, $attribute, $data, $htmlOptions = array())
	{
		$out = CHtml::openTag('div', array('class' => 'control-group'));
		$out .= CHtml::activeLabelEx($model, $attribute, array('class'=>'control-label'));
		$out .= CHtml::openTag('div', array('class' => 'controls'));
		$out .= parent::activeDropDownList($model, $attribute, $data, $htmlOptions);
		$out .= CHtml::closeTag('div');
		$out .= CHtml::closeTag('div');
		return $out;
	}
}