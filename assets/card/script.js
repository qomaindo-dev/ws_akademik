 let box = document.querySelectorAll(".box");

        function frontFunction() {
            box.forEach((x) => x.addEventListener("click", function () {
                this.classList.add("active");
            }))
        }

        function backFunction() {
            box.forEach((x) => x.addEventListener("click", function () {
                this.classList.remove("active");
            }))
        }