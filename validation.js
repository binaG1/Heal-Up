

        document.getElementById("signupForm").addEventListener("submit", function(e) {
            let valid = true;

            document.querySelectorAll(".error-msg").forEach(el => el.remove());

            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const confirm = document.getElementById("confirm");

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                showError(email, "Email nuk është valid!");
                valid = false;
            }

            const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{6,}$/;
            if (!passwordPattern.test(password.value)) {
                showError(password, "Password must have at least 6 characters, one uppercase letter, one number and one symbol.");
                valid = false;
            }

            if (password.value !== confirm.value) {
                showError(confirm, "Password does not match!");
                valid = false;
            }

            if (!valid) e.preventDefault();
        });

        function showError(input, message) {
            const error = document.createElement("div");
            error.className = "error-msg";
            error.textContent = message;
            input.insertAdjacentElement("afterend", error);
        }

