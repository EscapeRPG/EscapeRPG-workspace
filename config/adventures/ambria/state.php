<?php

$passwordDefaults = [];
for ($index = 1; $index <= 26; $index++) {
    $passwordDefaults['mdp' . $index] = false;
}

return [
    'defaults' => array_replace([
        '_scene' => 'index',
        'started' => false,
        'active_player' => null,
        'inventory' => [],
        'notes' => [],

        // Sullivan states are kept here so the two-player scenario can be migrated without reshaping storage later.
        'sullivanconfiance' => 100,
        'ambriawhisky' => false,
        'ambriapaul' => false,
        'ambriabibliotheque' => false,
        'bourseparterre' => false,
        'seloigner' => false,
        'ambriacabine' => false,
        'ambrialoganlocalise' => false,
        'cap' => false,
        'ambriajournalsullivan' => false,
        'recifsetape2' => false,
        'recifsetape3' => false,
        'recifsetape4' => false,
        'recifsetape5' => false,
        'pertehomme' => false,
        'leviers' => false,

        // Logan states.
        'loganconfiance' => 0,
        'parchemin' => false,
        'typecolere' => false,
        'mouette' => false,
        'cletypecolere' => false,
        'cledejapasse' => false,
        'biscuits' => false,
        'chapeautypecolere' => false,
        'cledocks' => false,
        'taverne' => false,
        'loganaide' => false,
        'loganpasaide' => false,
        'loganavecjake' => false,
        'dunettevisitee' => false,
        'victuailles' => false,
        'dunetteok' => false,
        'affale' => false,
        'haubans' => false,
        'rhum' => false,
        'riz' => false,
        'loganblesse' => false,
        'sullivanpasconfiant' => false,
        'sullivanconfiant' => false,
        'loganpasconfiant' => false,
        'loganconfiant' => false,
        'mutinerie' => false,
        'levier' => false,
        'tablette' => false,
        'portesciteenigme' => false,

        // Shared states.
        'bourse' => false,
        'ambriasurlesflots' => false,
        'ambrialogantrouve' => false,
        'etatquille' => 100,
        'quillecassee' => false,
        'matcasse' => false,
        'recifs' => false,
        'ile' => false,
        'grottes' => false,
        'portescite' => false,
        'grottesenigme' => false,
        'torcheseteintes' => false,
        'combat' => false,
        'combat2' => false,
        'combat3' => false,
        'fin' => false,
    ], $passwordDefaults),
];
