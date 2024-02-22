<form>
    <h2>Register</h2>

    <div class="form-group row mt-3">
        <div class="col">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control <?php if (isset($errors['first_name']) && !empty($errors['first_name'])) { echo "is-invalid"; } ?>" id="firstName" name="first_name" />
            <?php if (isset($errors['first_name'])) echo "<div class='invalid-feedback'>" . $errors['first_name'] . "</div>"; ?>
            <div class="valid-feedback">
                This field looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid first name.
            </div>
        </div>
        <div class="col">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control <?php if (isset($errors['last_name']) && !empty($errors['last_name'])) { echo "is-invalid"; } ?>" id="lastName" name="last_name" />
            <?php if (isset($errors['last_name'])) echo "<div class='invalid-feedback'>" . $errors['last_name'] . "</div>"; ?>
            <div class="valid-feedback">
                This field looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid last name.
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="email">Email address:</label>
        <input type="email" class="form-control <?php if (isset($errors['email']) && !empty($errors['email'])) { echo "is-invalid"; } ?>" id="email" name="email" />
        <?php if (isset($errors['email'])) echo "<div class='invalid-feedback'>" . $errors['email'] . "</div>"; ?>
        <div class="valid-feedback">
            This field looks good!
        </div>
        <div class="invalid-feedback">
            Please provide a valid email address.
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" class="form-control <?php if (isset($errors['contact_number']) && !empty($errors['contact_number'])) { echo "is-invalid"; } ?>" id="contactNumber" name="contact_number" />
        <?php if (isset($errors['contact_number'])) echo "<div class='invalid-feedback'>" . $errors['contact_number'] . "</div>"; ?>
        <div class="valid-feedback">
            This field looks good!
        </div>
        <div class="invalid-feedback">
            Please provide a valid contact number.
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control <?php if (isset($errors['password']) && !empty($errors['password'])) { echo "is-invalid"; } ?>" id="pwd" name="password" />
        <?php if (isset($errors['password'])) echo "<div class='invalid-feedback'>" . $errors['password'] . "</div>"; ?>
        <div class="valid-feedback">
            Strong password!
        </div>
        <div class="invalid-feedback">
            Please provide a valid password.
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="confirmPwd">Confirm Password:</label>
        <input type="password" class="form-control <?php if (isset($errors['confirm_password']) && !empty($errors['confirm_password'])) { echo "is-invalid"; } ?>" id="confirmPwd" name="confirm_password" />
        <?php if (isset($errors['confirm_password'])) echo "<div class='invalid-feedback'>" . $errors['confirm_password'] . "</div>"; ?>
        <div class="valid-feedback">
            Passwords match!
        </div>
        <div class="invalid-feedback">
            Please confirm your password.
        </div>
    </div>
    <div class="d-grid mt-3">
        <input
            type="submit"
            class="btn btn-primary btn-block mt-3"
            value="Submit"
        />
    </div>
</form>
