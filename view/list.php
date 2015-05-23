<div class="row marketing">
    <form action="/index.php">
        <label for="q">Search in:</label>
        <?php foreach ($provs as $key => $value): ?>
            <div class="radio">
                <label>    
                    <input type="radio" id="p" name="p" value="<?php echo $key ?>"<?php echo ($key == $p) ? ' checked': '' ?>>
                    <?php echo $value['name'] ?>
                </label>
            </div>
        <?php endforeach ?>
        <div class="input-group">
            <input type="text" class="form-control" name="q" id="q" value="<?php echo htmlspecialchars($q) ?>" required>
            <span class="input-group-btn">
                <input type="submit" class="btn btn-default" value="Search">
            </span>
        </div>
    </form>
</div>
<div class="row  marketing">
    <?php if(is_array($data)) : ?>
    <ul>
        <?php foreach ($data as $item): ?>
        <li>
            <h3>
                <a href="<?php echo $item['url'] ?>"><?php echo $item['title'] ?></a>
            </h3>
            <div><?php echo $item['displayUrl'] ?></div>
            <div><?php echo $item['content'] ?></div>
        </li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>
</div>