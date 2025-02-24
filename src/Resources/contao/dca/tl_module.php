<?php
$GLOBALS['TL_DCA']['tl_module']['palettes']['json_reader'] = '{title_legend},name,headline,type;{config_legend},json_url;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['json_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['json_url'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''"
];
