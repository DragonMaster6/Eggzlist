<h3> Create new Egg Listing </h3>

Listing title: <input type="text" title="title" value="<?php echo $title;?>">

Contact email.: <input type="text" name="email" value="<?php echo $email;?>">

number of eggs: <input type="text" name="eggcount" value="<?php echo $eggcount;?>">

Listing Information: <textarea name="comment" rows="15" cols="120"><?php echo $comment;?></textarea>

egg options:



<input type="radio" name="options"

<?php if (isset($options) && $options=="organic") echo "checked";?>
value="organic">Organic


<input type="radio" name="options"

<?php if (isset($ptions) && $options=="cornfed") echo "checked";?>
value="cornfed">Cornfed


<input type="radio" name="options"

<?php if (isset($ptions) && $options=="tablefed") echo "checked";?>
value="tablefed">Tablefed


<input type="radio" name="options"

<?php if (isset($ptions) && $options=="freerange") echo "checked";?>
value="freerange">Freerange


<input type="radio" name="options"

<?php if (isset($ptions) && $options=="feedfed") echo "checked";?>
value="feedfed">Feedfed


<input type="radio" name="options"

<?php if (isset($ptions) && $options=="na") echo "checked";?>
value="na">NA





<input type="submit" name="submit" value="Submit">
