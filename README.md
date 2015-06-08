[![Build status](https://travis-ci.org/ValkSystems/bootbuilder.svg)](https://travis-ci.org/ValkSystems/bootbuilder)

# BootBuilder

Bootstrap Form Building made easy in PHP.

## Installation

You can install the package with Composer, check out composer on http://getcomposer.org

Add the following to the required in the composer.json:
```
"valksystems/bootbuilder": ">=1.0.0"
```

## Usage

Checkout the demo folder for demo's with the controls and different styles of forms

### Forms

First of all, you have to create a Form object. There are 2 options right now. Just a normal form and a horizontal form (look at bootstrap page for more information).

To create a form use:
```php
$form = BootBuilder::open();

// Horizontal Form
$horizontal = BootBuilder::openHorizontal();
```

On the form object you can set the properties of a normal form with the following methods:
```php
setAction($action) // Set the action attribute
setClass($class) // set class (this will replace current class)
setId($id) // set the id of the form
setMethod($method) // set the method, either get or post
```

To add controls or panes to the form, use:
```php
$form->add($control);

// Or when adding multiple controls/panes at the same time:
$form->addAll($pane1, $control, $submit);
```

##### HorizontalForm
On a horizontal form you can set 2 more parameters for the grid layout. To set the layout parameters, use the following methods:
```php
$horizontal->setLabelCol($label_col) // for example col-md-3
$horizontal->setControlCol($control_col) // for example col-md-9
```

#### Rendering
To render the form you simply call ``` render() ```. You can also get the rendered HTML back with ``` render(true) ```.


### Controls

You can use the following controls, in fully bootstrap styles:

* Button
* Submit (Button)
* Checkbox
* Radio
* Text (input type=text)
* Number (input type=number)
* Email (input type=email)
* TextArea
* Hidden (input type=hidden)
* Password (input type=password)
* Select

##### Default operations on controls

To create a new control. Construct the class for the control with:
```php
use \bootbuilder\Controls\Text;

$text = new Text("name");
// Or you can directly give it a label, ID and value with the optional constructor parameters
$text = new Text("name", "Please enter your name", "name_id", "Current Name");
```


On all the controls you can set the name, id, class(es), value, placeholder, label text, required (y/n), disabled (y/n), readonly (y/n), errorstate (y/n) and helptext with simple methods:

```php
setId($id) // set the id of the control tag (<input>/<select>/etc)
setClass($class), addClass($class), removeClass($class) // Edit the current class(es)
setValue($value) // set the value of the control. (not filtered!!)
setPlaceholder($placeholder) // set the placeholder
setLabel($labeltext) // set the label text, for using when rendering in a supported form
setRequired($required) // set if the control is required (note, browser can be manipulated)
setDisabled($disabled) // set disabled state
setReadOnly($readonle) // set readonly state
setErrorState($errorstate) // set if the control is in error state
setHelpText($helptext) // set helptext for under the control
```

After creating you can either add it to a pane or to the form directly.

##### Text
You can enter a custom type of input now, with the method ``` setType($type) ```

##### TextArea
On a TextArea object you can set the optional rows parameter with the method ``` setRows($rows) ```

##### Select

To set the data in the select control (the options), use the following method:

```php
$options = array("key_value" => "Key Value");
setOptions($options);
```

The $options need to have an array with: [value] = "Readable text".

### Panes

You can combine controls with panes, it's like an group with elements, but specific with the style it has.
Currently there are 2 panes, StackPane and InlinePane

To create a pane and add controls to it use:
```php
$pane = new StackPane("Label Here");
$pane->addControl($control);

$form->add($pane);
```

##### StackPane

StackPane will combine elements, each on a new row. Just adding it below it.

##### InlinePane

InlinePane will make the supported controls (checkbox and radio) display with an in-line style.
See http://getbootstrap.com/css/?#inline-checkboxes-and-radios for more information.


## License

This project is under MIT License, see LICENSE file.


## Resposibility
We are not resposible for any security problems, always check code before you are going to use it!
