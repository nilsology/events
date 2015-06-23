<?php

$vid = rex_request('vid', 'int');

if ($func == '') {
  $list = rex_list::factory('
    SELECT v.vid, v.name, v.street, v.city 
    FROM '. $REX['ADDON']['dbpref']['events'] .'venues v
    ORDER BY vid
    LIMIT 10;');

  $imgHeader = '<a href="'. $list->getUrl(array('func' => 'add')) .'"><img src="media/metainfo_plus.gif" alt="add" title="add" /></a>';

  $list->setColumnSortable('name');
  $list->setColumnSortable('city');

  $list->addColumn(
    $imgHeader,
    '<img src="media/metainfo.gif" alt="field" title="field" />',
    0,
    array(
      '<th class="rex-icon">###VALUE###</th>',
      '<td class="rex-icon">###VALUE###</td>'
    )
  );

  $list->setColumnParams(
    $imgHeader,
    array('func' => 'edit', 'vid' => '###vid###')
  );

  $list->setColumnLabel('name', 'Veranstaltungsort');
  $list->setColumnLabel('street', 'Stra&szlig;e');
  $list->setColumnLabel('city', 'Stadt');

  $list->removeColumn('vid');

  $list->setColumnLayout(
    'eid',
    array(
      '<th class="rex-icon">###VALUE###</th>',
      '<td class="rex-icon">###VALUE###</td>'
    )   
  );

  $list->setColumnParams('name', array('func' => 'edit', 'vid' => '###vid###'));
  $list->show();

} elseif ($func == 'edit' || $func == 'add') {
  $form = rex_form::factory($REX['ADDON']['dbpref']['events'].'venues', 'Veranstaltungsorte', 'vid='.$vid);

  $field = &$form->addTextField('name');
  $field->setLabel('Veranstaltungsort');

  $field = &$form->addTextField('street');
  $field->setLabel('Stra&szlig;e');

  $field = &$form->addTextField('city');
  $field->setLabel('Stadt');

  if ($func == 'edit') {
    $form->addParam('eid', $id);
  }

  $form->show();
}
?>
