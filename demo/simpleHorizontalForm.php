<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BootBuilder Sample</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h1>Sample Form</h1>
            <?php

            require __DIR__ . '/../vendor/autoload.php';
            
            use \bootbuilder\BootBuilder;
            use \bootbuilder\Controls\Text, \bootbuilder\Controls\TextArea, \bootbuilder\Controls\Button, \bootbuilder\Controls\Email;
            use \bootbuilder\Controls\Submit, \bootbuilder\Controls\Checkbox, \bootbuilder\Controls\File, \bootbuilder\Controls\Hidden;
            use \bootbuilder\Controls\Password, \bootbuilder\Controls\Radio, \bootbuilder\Controls\Select, \bootbuilder\Controls\CustomHtml;

            $form = BootBuilder::openHorizontal();
            $form->setAction("");
            $form->setId("sampleform");

            $form->add(new Text('sample_text', 'Testing Label', null, 'Default Value'));
            
            $txt = new Text("sample2");
            $txt->setPlaceholder("Placeholder here");
            $txt->setLabel("This is a placeholder test");
            
            $email = new Email("email", "Your e-mail");
            $email->setRequired(true);
            
            $area = new TextArea("sample_area");
            
            $password = new Password("login_password", "Password");
            $password->setDisabled(true);
            
            $checkb1 = new Checkbox("remember", "Remember my settings");
            $checkb2 = new Checkbox("accept", "Accept our privacy policy");
            $checkb2->setChecked(true);
            
            $radio1 = new Radio("envi", "Live version", "envi_live", "live");
            $radio2 = new Radio("envi", "Development version", "envi_dev", "dev");
            $radio1->setChecked(true);
            
            $select1 = new Select("select_test", "Select branche");
            $select1->setOptions(array(
                "master" => "Master branche", 
                "dev" => "dev", 
                "testing1" => "Highly testing, mostly broken"));
            $select1->setValue("testing1");
            
            $file1 = new File("file_sample", "Logo", "logo_file");
            
            $hidden = new Hidden("testing_hidden", "Hidden Value");
            
            $customhtml = new CustomHtml("<hr>");
            
            $submit = new Submit("Send");
            
            $form->addAll($txt, $email, $area, $password, $checkb1, $checkb2, $radio1, $radio2, $select1, $file1, $hidden, $customhtml, $submit);

            $form->render();

            
            
            
            
            
            
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
