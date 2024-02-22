<form>
    <h2>Login</h2>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
    <div class="form-group mt-3">
        <label for="email">Email address:</label>
        <input type="email" class="form-control <?php if (isset($errors['email']) && !empty($errors['email'])) { echo "is-invalid"; } ?>" id="email" name="email"/>
        <?php if (isset($errors['email'])) echo "<div class='invalid-feedback'>" . $errors['email'] . "</div>"; ?>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please provide a valid email address.
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control <?php if (isset($errors['password'])) echo "is-invalid"; ?>" id="pwd" name="password"/>
        <?php if (isset($errors['password'])) echo "<div class='invalid-feedback'>" . $errors['password'] . "</div>"; ?>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please provide a valid password.
        </div>
    </div>
    <div class="d-grid">
        <input
            type="submit"
            class="btn btn-primary btn-block mt-3"
            value="Submit"
        />
    </div>
</form>