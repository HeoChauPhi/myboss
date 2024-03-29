<?php
/**
 *
 * $HeadURL: https://www.onthegosystems.com/misc_svn/common/tags/Views-1.6.4-CRED-1.3.2-Types-1.6.4-Acces-1.2.3/toolset-forms/classes/class.select.php $
 * $LastChangedDate: 2014-09-09 18:13:56 +0800 (Tue, 09 Sep 2014) $
 * $LastChangedRevision: 26869 $
 * $LastChangedBy: francesco $
 *
 */
require_once 'class.field_factory.php';

/**
 * Description of class
 *
 * @author Srdjan
 */
class WPToolset_Field_Select extends FieldFactory
{

    public function metaform() {
        $value = $this->getValue();
        $data = $this->getData();
        $attributes = $this->getAttr();

        $form = array();
        $options = array();
        if (isset($data['options'])) {
            foreach ( $data['options'] as $option ) {
                $one_option_data = array(
                    '#value' => $option['value'],
                    '#title' => stripslashes($option['title']),
                );
                /**
                 * add default value if needed
                 * issue: frontend, multiforms CRED
                 */
                if ( array_key_exists( 'types-value', $option ) ) {
                    $one_option_data['#types-value'] = $option['types-value'];
                }
                /**
                 * add to options array
                 */
                $options[] = $one_option_data;
            }
        }
        $options = apply_filters( 'wpt_field_options', $options, $this->getTitle(), 'select' );
        /**
         * default_value
         */
        if ( !empty( $value ) || $value == '0' ) {
            $data['default_value'] = $value;
        }
        
        $is_multiselect = array_key_exists('multiple', $attributes) && 'multiple' == $attributes['multiple'];
        $default_value = isset( $data['default_value'] ) ? $data['default_value'] : null;
        //Fix https://icanlocalize.basecamphq.com/projects/7393061-toolset/todo_items/189219391/comments
        if ($is_multiselect) {
            $default_value = new RecursiveIteratorIterator(new RecursiveArrayIterator($default_value));
            $default_value = iterator_to_array($default_value,false);
        }
        //##############################################################################################

        /**
         * metaform
         */
        $form[] = array(
            '#type' => 'select',
            '#title' => $this->getTitle(),
            '#description' => $this->getDescription(),
            '#name' => $this->getName(),
            '#options' => $options,
            '#default_value' => $default_value,
            '#multiple' => $is_multiselect,
            '#validate' => $this->getValidationData(),
            '#class' => 'form-inline',
            '#repetitive' => $this->isRepetitive(),
        );

        return $form;
    }

}
