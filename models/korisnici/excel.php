<?php 
    // include "../../config/connection.php";
    
    // $excel_app = new COM("Excel.Application");
    //     $excel_app->Visible = true;
    //     $excel_file = $excel_app->Workbooks->Add();

    //     $worksheet = $excel_file->Worksheets("Sheet1");
    //     $worksheet->activate();

    //     $field_A1 = $worksheet->Range("A1");
    //     $field_A1->activate;
    //     $field_A1->Value = "ID";

    //     $field_B1 = $worksheet->Range("B1");
    //     $field_B1->activate;
    //     $field_B1->Value = "Korisnicko ime";

    //     $field_C1 = $worksheet->Range("C1");
    //     $field_C1->activate;
    //     $field_C1->Value = "Email";

    //     $field_D1 = $worksheet->Range("D1");
    //     $field_D1->activate;
    //     $field_D1->Value = "Lozinka";

    //     $field_E1 = $worksheet->Range("E1");
    //     $field_E1->activate;
    //     $field_E1->Value = "Uloga";

    //     $br = 2;
    // $upit="SELECT * FROM korisnici k INNER JOIN uloge u ON k.ulogaID=u.ulogaID ORDER BY u.ulogaID";
    // $rezultat=$konekcija->query($upit);
 
    // if($rezultat){
    //     $korisnici=$rezultat->fetchAll();
    //     foreach($korisnici as $kor){
    //         $field_A = $worksheet->Range("A".$br);
    //         $field_A->activate;
    //         $field_A->Value = $kor->korisnikID;

    //         $field_B = $worksheet->Range("B".$br);
    //         $field_B->activate;
    //         $field_B->Value = $kor->korIme;

    //         $field_C = $worksheet->Range("C".$br);
    //         $field_C->activate;
    //         $field_C->Value = $kor->email;

    //         $field_D = $worksheet->Range("D".$br);
    //         $field_D->activate;
    //         $field_D->Value = $kor->lozinka;

    //         $field_E = $worksheet->Range("E".$br);
    //         $field_E->activate;
    //         $field_E->Value = $kor->ulogaNaziv;

    //         $br++;
    //     }
    // }
    

    //     $fileName = "korisnici.xlsx";
    //     $excel_file->SaveAs($fileName);
    //     $excel_file->Close(false);
    //     $excel_app->Workbooks->Close();
    //     unset($worksheet);
    //     $excel_app->Quit();
    //     $excel_app = null;
    

    header('Location:../../index.php?stranica=greska');

