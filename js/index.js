const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector(".btn-close");
    
    // close modal function
const closeModal = function () 
{
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
};
    
    // close the modal when the close button and overlay is clicked
closeModalBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);
    
    // close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) 
        {
       closeModal();
    }
    });
    
    // open modal function
    const openModal = function () {
      modal.classList.remove("hidden");
      overlay.classList.remove("hidden");
    };
    // open modal event
    openModalBtn.addEventListener("click", openModal);




    const del = document.querySelector(".del");
    const del_overlay = document.querySelector(".overlay");
const opendelBtn = document.querySelector(".btn-open");
const closedelBtn = document.querySelector(".btn-close");
    
    // close modal function
const closedel = function () 
{
    del.classList.add("hidden");
    del_overlay.classList.add("hidden");
};
    
    // close the modal when the close button and overlay is clicked
closedelBtn.addEventListener("click", closedel);
del_overlay.addEventListener("click", closedel);
    
    // close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !del.classList.contains("hidden")) 
        {
       closeModal();
    }
    });
    
    // open modal function
    const opendel = function () {
      modal.classList.remove("hidden");
      del_overlay.classList.remove("hidden");
    };
    // open modal event
    opendelBtn.addEventListener("click", opendel);