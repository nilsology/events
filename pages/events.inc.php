<?php

$eid = rex_request('eid', 'int');

if ($func == '') {
  $list = rex_list::factory('
    SELECT  e.eid, e.name, e.date, e.time,
    o.name AS organizer,
    v.name AS venue,
    e.age
    FROM '. $REX['ADDON']['dbpref']['events'] .'events e
    JOIN '. $REX['ADDON']['dbpref']['events'] .'venues v ON e.vid = v.vid
    JOIN '. $REX['ADDON']['dbpref']['events'] .'orgs o ON e.oid = o.oid
    ORDER BY date
    LIMIT 10;');

  $imgHeader = '<a href="'. $list->getUrl(array('func' => 'add')) .'"><img src="media/metainfo_plus.gif" alt="add" title="add" /></a>';

  $list->setColumnSortable('name');
  $list->setColumnSortable('date');
  $list->setColumnSortable('organizer');
  $list->setColumnSortable('venue');
  $list->setColumnSortable('age');

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
    array('func' => 'edit', 'eid' => '###eid###')
  );

  $list->setColumnLabel('date', 'Datum');
  $list->setColumnLabel('time', 'Zeit');
  $list->setColumnLabel('venue', 'Ort');
  $list->setColumnLabel('name', 'Veranstaltung');
  $list->removeColumn('description');
  $list->setColumnLabel('url', 'Webadresse');
  $list->setColumnLabel('organizer', 'Veranstalter');
  $list->setColumnlabel('age', 'Alter');

  $list->removeColumn('eid');

  $list->setColumnLayout(
    'eid',
    array(
      '<th class="rex-icon">###VALUE###</th>',
      '<td class="rex-icon">###VALUE###</td>'
    )   
  );

  $list->setColumnParams('name', array('func' => 'edit', 'eid' => '###eid###'));
  $list->show();

} elseif ($func == 'edit' || $func == 'add') {
  $form = rex_form::factory($REX['ADDON']['dbpref']['events'].'events', 'Termine', 'eid='.$eid, 'post', false);

  $field = &$form->addTextField('name');
  $field->setLabel('Veranstaltung');

  $field = &$form->addTextAreaField('description');
  $field->setLabel('Beschreibung');

  $field = &$form->addInputField('date', 'date');
  $field->setLabel('Datum');
  $field = &$form->addInputField('time', 'time');
  $field->setLabel('Uhrzeit');

  $field = &$form->addSelectField('oid');
  $field->setLabel('Veranstalter');
  $select =& $field->getSelect();
  $select->setSize(1);
  $query = 'SELECT name as label, oid FROM '. $REX['ADDON']['dbpref']['events'] .'orgs';
  $select->addSqlOptions($query);

  $field = &$form->addSelectField('vid');
  $field->setLabel('Ort');
  $select =& $field->getSelect();
  $select->setSize(1);
  $query = 'SELECT name as label, vid FROM '. $REX['ADDON']['dbpref']['events'] .'venues';
  $select->addSqlOptions($query);

  $field = &$form->addInputField('url', 'url');
  $field->setLabel('Link zur Veranstaltung');

  $field = &$form->addInputField('number', 'age');
  $field->setLabel('Alter (ab)');

  if ($func == 'edit') {
    $form->addParam('eid', $eid);
  }

  $form->show();
}
?>
