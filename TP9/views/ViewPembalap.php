<?php

include_once("KontrakView.php");
include_once("models/Pembalap.php");

// class ViewPembalap mengimplementasi KontrakView
class ViewPembalap implements KontrakView{

    public function __construct(){}

    public function tampilPembalap($listPembalap): string {

        $tbody = '';
        $no = 1;
        foreach($listPembalap as $pembalap){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getNama()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getTim()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getNegara()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getPoinMusim()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getJumlahMenang()) .'</td>';

            $tbody .= '<td class="col-actions">
                <a href="index.php?screen=edit&id='. $pembalap->getId() .'" class="btn btn-edit">Edit</a>

                <form method="POST" style="display:inline;" 
                      onsubmit="return confirm(\'Yakin ingin menghapus?\')">
                    <input type="hidden" name="id" value="'. $pembalap->getId() .'">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit" class="btn btn-delete">Hapus</button>
                </form>
            </td>';

            $tbody .= '</tr>';
            $no++;
        }

        // Load template skin
        $templatePath = __DIR__ . '/../template/skin.html';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);

            // Inject data
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('{{TOTAL}}', count($listPembalap), $template);
            return $template;
        }

        return $tbody;
    }

    public function tampilFormPembalap($data = null): string {

        $template = file_get_contents(__DIR__ . '/../template/form.html');

        if ($data) {

            // Ganti action = edit
            $template = str_replace('{{ACTION}}', 'edit', $template);

            // Isi value input
            $template = str_replace('{{ID}}', htmlspecialchars($data['id']), $template);
            $template = str_replace('{{NAMA}}', htmlspecialchars($data['nama']), $template);
            $template = str_replace('{{TIM}}', htmlspecialchars($data['tim']), $template);
            $template = str_replace('{{NEGARA}}', htmlspecialchars($data['negara']), $template);
            $template = str_replace('{{POIN}}', htmlspecialchars($data['poinMusim']), $template);
            $template = str_replace('{{MENANG}}', htmlspecialchars($data['jumlahMenang']), $template);
        }

        else {
            $template = str_replace('{{ACTION}}', 'add', $template);
            $template = str_replace('{{ID}}', '', $template);
            $template = str_replace('{{NAMA}}', '', $template);
            $template = str_replace('{{TIM}}', '', $template);
            $template = str_replace('{{NEGARA}}', '', $template);
            $template = str_replace('{{POIN}}', '', $template);
            $template = str_replace('{{MENANG}}', '', $template);
        }

        return $template;
    }
}

?>
