<?php

    // include "../../config/connection.php";
    

    //     $word = new COM("Word.Application");

    //     $word->Visible = 1;
    //     $word->Documents->Add();

    //     $upit="SELECT * FROM autor";
    //     $rezultat=$konekcija->query($upit);
    //     if($rezultat){
    //     $autor=$rezultat->fetch();
    //     foreach($autor as $a){
    //         $word->Selection->InlineShapes->AddPicture(ABSOLUTE_PATH."/assets/img/".$a->slika);
    //         $word->Selection->TypeText("\n");
    //         $word->Selection->TypeText("{$a->ime}\t");
    //         $word->Selection->TypeText("{$a->prezime}\n");
    //         $word->Selection->TypeText("{$a->opis}\n");
    //     }
    // }

    //     $imeFajla = "autor.doc";
    //     $word->Documents[1]->SaveAs($imeFajla);
    //     $word->Quit();
    //     $word = null;

    //     http_response_code(204);
    
    header('Location: ../../index.php?stranica=autor');