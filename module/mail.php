<div class="modal mail" aria-hidden="false">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Trimite rezultatul</p>
            <button class="delete close_modal" aria-label="close"></button>
        </header>
        <form action="quiz.php" method="post">
            <section class="modal-card-body">
               <div class="content">
                   <p class="red">*Obligatoriu</p>
               </div>
                <div class="field">
                    <label class="label">Nume <span class="red">*</span></label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="nume" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">E-mail <span class="red">*</span></label>
                    <div class="control has-icons-left">
                        <input class="input" type="email" name="email" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <div class="btns">
                    <button class="button is-success" name="submit">Trimite</button>
                </div>
            </footer>
        </form>
    </div>
</div>
