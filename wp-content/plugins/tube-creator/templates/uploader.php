<?php
    /**
     * 
     *  The CSV Format
     * 
     * 0. 
     * 1. URL
     * 2. Categories
     * 3. Rating
     * 4. Username
     * 5. Title
     * 6. Tags
     * 7. Views
     * 8. Pornstars
     * 9. Thumbnail
     * 10. Filpbook
     * 
     */
     
    if (isset($_POST['wpTubeCreatorForm'])){
        
        $csvFileURL = $_POST['wpTubeCreatorForm']['videosFileURL'];
        $fileContents = file_get_contents($csvFileURL);
        
        // parse the csv file
        $lines = explode(PHP_EOL, $fileContents);
        $csvArray = array();
        foreach ($lines as $line) {
            $csvArray[] = str_getcsv($line, '|');
        }
        
        echo '<pre>';
        print_r($csvArray[0]);
        echo '</pre>';
    }
?>

<h1>Load Videos</h1>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="control-group">
            <label for="videosFileURL">Choose A File From URL:</label>
            <div class="control">
                <input type="url" id="videosFileURL" name="wpTubeCreatorForm[videosFileURL]" />
            </div>
        </div>
    </fieldset>
    <div class="actions">
        <input type="submit" value="Send"/>
    </div>
</form>

