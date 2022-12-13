<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Read Files</title>
</head>

<body>
    <?php
    $myfile = fopen("file/sample.txt", "r") or die("Unable to open file!");
    $txt = fread($myfile, filesize("file/sample.txt"));
    fclose($myfile);

    require 'vendor/autoload.php';
    $content = '';
    $reader = \PhpOffice\PhpWord\IOFactory::createReader("Word2007");
    $phpWord = $reader->load("file/sample.docx");
    foreach ($phpWord->getSections() as $section) {
        foreach ($section->getElements() as $element) {
            if (method_exists($element, 'getElements')) {
                foreach ($element->getElements() as $childElement) {
                    if (method_exists($childElement, 'getText')) {
                        $content .= $childElement->getText() . ' ';
                    } else if (method_exists($childElement, 'getContent')) {
                        $content .= $childElement->getContent() . ' ';
                    }
                }
            } else if (method_exists($element, 'getText')) {
                $content .= $element->getText() . ' ';
            }
        }
    }

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $xlsx = $reader->load("file/sample.xlsx");
    $weathers = $xlsx->getActiveSheet()->toArray();

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $csv = $reader->load("file/sample.csv");
    $users = $csv->getActiveSheet()->toArray();
    ?>

    <div class="container">
    <h2>.txt</h2>
    <p><?php echo $txt; ?></p>
    <h2>.doc</h2>
    <p><?php echo $content; ?></p>
    <h2>.xlsx</h2>
    <table class="output">
        <?php foreach ($weathers as $weather) { ?>
            <tr>
                <?php foreach ($weather as $key => $value) { ?>
                    <td><?php echo $value; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <h2>.csv</h2>
    <table class="output">
        <?php foreach ($users as $user) { ?>
            <tr>
                <?php foreach ($user as $key => $value) { ?>
                    <td><?php echo $value; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>

</html>
