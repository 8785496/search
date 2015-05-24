<div class="row marketing">
    <form action="/index.php">
        <p>Search in:</p>
        <?php $i = 0 ?>
        <?php foreach ($provs as $key => $value): ?>
            <div class="radio">
                <label>
                    <input type="radio" name="p" value="<?php echo $key ?>"<?php echo ($i == 0) ? ' checked' : '' ?>>
                    <?php echo $value['name'] ?> 
                    <?php $i++ ?>
                </label>
            </div>
        <?php endforeach ?>
        <div class="input-group">
            <input type="text" class="form-control" name="q" id="q" required>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-default" value="Search">
            </span>
        </div>
    </form>                     
</div>
