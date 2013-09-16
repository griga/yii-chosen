<?php
/**
 * Author: Yura Griga
 * Email: grigach@gmail.com
 */

require_once('Chosen.php');

/**
 * Class TbChosen
 */
class TbChosen extends Chosen
{
    /**
     * @param $model
     * @param $attribute
     * @param $data
     * @param array $htmlOptions
     * @return string
     */
    public static function activeMultiSelect($model, $attribute, $data, $htmlOptions = array())
    {
        return self::bootstrapChosenFactory('multi', $model, $attribute, $data, $htmlOptions);
    }


    /**
     * @param CModel $model
     * @param string $attribute
     * @param array $data
     * @param array $htmlOptions
     * @return string
     */
    public static function activeDropDownList($model, $attribute, $data, $htmlOptions = array())
    {
        return self::bootstrapChosenFactory('single', $model, $attribute, $data, $htmlOptions);
    }

    /**
     * @param string $type
     * @param CModel $model
     * @param string $attribute
     * @param array $data
     * @param array $htmlOptions
     * @return string
     */
    private static function bootstrapChosenFactory($type, $model, $attribute, $data, $htmlOptions = array())
    {
        $out = CHtml::openTag('div', array('class' => 'control-group'));
        $out .= CHtml::activeLabelEx($model, $attribute, array('class' => 'control-label'));
        $out .= CHtml::openTag('div', array('class' => 'controls bootstrap-chosen'));
        if (($check = isset($htmlOptions['class'])) === true) {
            $out .= CHtml::openTag('div', array('class' => $htmlOptions['class']));
            unset($htmlOptions['class']);
        }
        $hasError = $model->hasErrors($attribute);
        if ($hasError) {
            self::addErrorCss($htmlOptions);
        };
        if ($type === 'single') {
            $out .= parent::activeDropDownList($model, $attribute, $data, $htmlOptions);
        } else {
            $out .= parent::activeMultiSelect($model, $attribute, $data, $htmlOptions);
        }
        if ($check) {
            $out .= CHtml::closeTag('div');
        }
        $out .= $hasError ? CHtml::tag('span', array('class' => 'help-inline ' . CHtml::$errorCss), $model->getError($attribute)) : '';
        $out .= CHtml::closeTag('div');
        $out .= CHtml::closeTag('div');
        return $out;
    }


    /**
     * Appends {@link errorCss} to the 'class' attribute.
     * @param array $htmlOptions HTML options to be modified
     */
    protected static function addErrorCss(&$htmlOptions)
    {
        if (empty(CHtml::$errorCss))
            return;
        if (isset($htmlOptions['class']))
            $htmlOptions['class'] .= ' ' . CHtml::$errorCss;
        else
            $htmlOptions['class'] = CHtml::$errorCss;
    }
}