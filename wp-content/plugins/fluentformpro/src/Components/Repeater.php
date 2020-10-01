<?php
namespace FluentFormPro\Components;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use FluentForm\App\Services\FormBuilder\Components\BaseComponent;
use FluentForm\Framework\Helpers\ArrayHelper;

class Repeater extends BaseComponent
{
	/**
	 * Wrapper class for repeat element
	 * @var string
	 */
	protected $wrapperClass = 'ff-el-repeat js-repeat';

	/**
	 * Compile and echo the html element
	 * @param  array $data [element data]
	 * @param  stdClass $form [Form Object]
	 * @return viod
	 */
	public function compile($data, $form)
	{
        $elementName = $data['element'];
        $data = apply_filters('fluenform_rendering_field_data_'.$elementName, $data, $form);

        // Test implementation using address component
		$rootName = $data['attributes']['name'];
		$hasConditions = $this->hasConditions($data) ? 'has-conditions ' : '';
		@$data['attributes']['class'] .= ' ' . $this->wrapperClass . ' ' . $hasConditions.' '.ArrayHelper::get($data, 'settings.container_class');
		$data['attributes']['class'] = trim($data['attributes']['class']);

		$data['attributes']['data-max_repeat'] = ArrayHelper::get($data, 'settings.max_repeat_field');

        if($labelPlacement = ArrayHelper::get($data, 'settings.label_placement')) {
            $data['attributes']['class'] .= ' ff-el-form-'.$labelPlacement;
        }

		$atts = $this->buildAttributes(
            \FluentForm\Framework\Helpers\ArrayHelper::except($data['attributes'], 'name')
        );
		ob_start();
		echo "<div {$atts}>";

		$first = $data['fields'][0]['settings'];
		if (count($data['fields']) == 1 && $first['validation_rules']['required']['value']) {
    		echo "<div class='ff-el-input--label ff-el-is-required'>";
    	} else {
    		echo "<div class='ff-el-input--label'>";
    	}

        echo "<label>{$data['settings']['label']}</label>";
		echo "</div><div class='ff-el-input--content'>";

        echo "<div class='ff-t-container'>";
        foreach ($data['fields'] as $key => $item) {

        	if (count($data['fields']) == 1) {
        		$item['settings']['label'] = '';
        	}

            $item['attributes']['name'] = $rootName.'['.$key.'][]';

            $item = $this->app->applyFilters('fluentform_before_render_item', $item, $form);


            echo "<div class='ff-t-cell'>";
            $this->app->doAction('fluentform_render_item_'.$item['element'], $item, $form);
            echo "</div>";
        }

        echo "</div>";
        echo $this->getRepeater($data['element']);
		echo "</div>";
		echo "</div>";
		$html = ob_get_clean();
        echo apply_filters('fluenform_rendering_field_html_'.$elementName, $html, $data, $form);
        \FluentForm\App\Helpers\Helper::getNextTabIndex(50);
	}

	/**
	 * Compile repeater buttons
	 * @param  string $el [element name]
	 * @return string
	 */
	protected function getRepeater($el)
	{
        if ($el == 'input_repeat') {
            $div = '<div class="ff-el-repeat-buttons-list js-repeat-buttons">';
			$div .= '<div class="ff-el-repeat-buttons">';
			$div .= '<span class="repeat-plus ff-icon icon-plus-circle"></span>';
			$div .= '<span class="repeat-minus ff-icon icon-minus-circle"></span></div>';
            $div .= '</div>';
			return $div;
		}
		return '';
	}
}
