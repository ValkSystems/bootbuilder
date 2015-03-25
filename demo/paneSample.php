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
            <h1>Sample StackPane and InlinePane</h1>
            <?php
            
            var_dump($_POST);

            require __DIR__ . '/../vendor/autoload.php';
            
            use \bootbuilder\BootBuilder;
            use \bootbuilder\Controls\Text, \bootbuilder\Controls\TextArea, \bootbuilder\Controls\Button, \bootbuilder\Controls\Email;
            use \bootbuilder\Controls\Submit, \bootbuilder\Controls\Checkbox, \bootbuilder\Controls\File, \bootbuilder\Controls\Hidden;
            use \bootbuilder\Controls\Password, \bootbuilder\Controls\Radio;
            
            use \bootbuilder\Pane\StackPane, \bootbuilder\Pane\InlinePane;

            $form = BootBuilder::openHorizontal();
            $form->setAction("");
            $form->setMethod("post");
            $form->setId("stackedcontrols");

            $form->add(new Text('sample_text', 'Testing Label', null, 'Default Value'));
            
            $txt = new Text("sample2");
            $txt->setPlaceholder("Placeholder here");
            $txt->setLabel("This is a placeholder test");
            
            $email = new Email("email", "Your e-mail");
            
            $area = new TextArea("sample_area");
            
            $password = new Password("login_password", "Password");
            
            $checkb1 = new Checkbox("remember", "Remember my settings");
            $checkb2 = new Checkbox("accept", "Accept our privacy policy");
            $checkb2->setChecked(true);
            
            // Create stackpane
            $stack1 = new StackPane("Options");
            $stack1->addAll($checkb1, $checkb2);
            
            $radio1 = new Radio("envi", "Live version", "envi_live", "live");
            $radio2 = new Radio("envi", "Development version", "envi_dev", "dev");
            $radio1->setChecked(true);
            
            // Create stackpane
            $inline1 = new InlinePane("Select version");
            $inline1->addControl($radio1);
            $inline1->addControl($radio2);
            
            $file1 = new File("file_sample", "Logo", "logo_file");
            
            $hidden = new Hidden("testing_hidden", "Hidden Value");
            
            $submit = new Submit("Send");
            $cancel = new Button("Cancel");
            $inline2 = new InlinePane("");
            $inline2->addAll($submit, $cancel);
            
            // Add all controls and panes to the form
            $form->addAll($txt, $email, $area, $password, $stack1, $inline1, $file1, $hidden, $inline2);

            $form->render();

            
            
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
