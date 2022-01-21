@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <form method="post" action="/" novalidate>

        <?= csrf_field() ?>

        <div class="w3-margin-bottom">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required class="w3-input w3-border">
            
            <?php if($errors->first('email')): ?>
                <br>
                <span class="w3-text-red"><?= $errors->first('email'); ?></span>
            <?php endif; ?>
        </div>

        <div class="w3-margin-bottom">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required class="w3-input w3-border">

            <?php if($errors->first('password')): ?>
                <br>
                <span class="w3-text-red"><?= $errors->first('password'); ?></span>
            <?php endif; ?>
        </div>
        
        <div class="w3-center">
            <button type="submit" class="w3-btn w3-orange">Log In</button>
        </div>

    </form>

</section>

@endsection
        