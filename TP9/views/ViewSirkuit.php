<?php

include_once("KontrakViewSirkuit.php");
include_once("models/Sirkuit.php");
$templatePath = __DIR__ . '/../template/skin_sirkuit.html';

// class ViewSirkuit mengimplementasi KontrakViewSirkuit

class ViewSirkuit implements KontrakViewSirkuit {

    public function __construct(){}

    // tampilkan list sirkuit
    public function tampilList($listSirkuit): string {

        $tbody = '';
        $no = 1;

        foreach($listSirkuit as $s){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($s->getNama()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($s->getLokasi()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($s->getPanjang()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($s->getJumlahTikungan()) .'</td>';

            $tbody .= '<td class="col-actions">
                <a href="sirkuit.php?screen=edit_sirkuit&id='. $s->getId() .'" class="btn btn-edit">Edit</a>

                <form method="POST" style="display:inline;" 
                      onsubmit="return confirm(\'Yakin ingin menghapus?\')">
                    <input type="hidden" name="id" value="'. $s->getId() .'">
                    <input type="hidden" name="action" value="delete_sirkuit">
                    <button type="submit" class="btn btn-delete">Hapus</button>
                </form>
            </td>';

            $tbody .= '</tr>';
            $no++;
        }

        $templatePath = __DIR__ . '/../template/skin_sirkuit.html';

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);

            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('{{TOTAL}}', count($listSirkuit), $template);

            return $template;
        }

        return $tbody;
    }

    // tampilkan form add / edit sirkuit
    public function tampilForm($data = null): string {

        $template = file_get_contents(__DIR__ . '/../template/form_sirkuit.html');

        if ($data) {
            $template = str_replace('{{ACTION}}', 'edit_sirkuit', $template);
            $template = str_replace('{{ID}}', $data->getId(), $template);
            $template = str_replace('{{NAMA}}', $data->getNama(), $template);
            $template = str_replace('{{LOKASI}}', $data->getLokasi(), $template);
            $template = str_replace('{{PANJANG}}', $data->getPanjang(), $template);
            $template = str_replace('{{TIKUNGAN}}', $data->getJumlahTikungan(), $template);
        } else {
            $template = str_replace('{{ACTION}}', 'add_sirkuit', $template);
            $template = str_replace('{{ID}}', '', $template);
            $template = str_replace('{{NAMA}}', '', $template);
            $template = str_replace('{{LOKASI}}', '', $template);
            $template = str_replace('{{PANJANG}}', '', $template);
            $template = str_replace('{{TIKUNGAN}}', '', $template);

        }


        return $template;
    }
}

?>
