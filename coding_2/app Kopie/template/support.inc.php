<?php
if (!defined('APP_ROOT') || !($this instanceof AppController)) {
    die('only included please..');
}
?>
<div class="jumbotron">
    <h2>Support</h2>
    Todo... Formular noch nicht funktional...
</div>

<div class="row">
    <form class="form-horizontal" action="" method="post">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ansprechpartner">Name</label>
                <div class="col-md-4">
                    <input id="ansprechpartner" name="ansprechpartner" placeholder="Max Mustermann"
                           class="form-control input-md" required="" type="text"
                           value="<?php print $tenant_info['owner']; ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-4">
                    <input id="email" name="email" placeholder="email.." class="form-control input-md" required=""
                           type="text" value="<?php print $tenant_info['email']; ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefon">Telefon</label>
                <div class="col-md-4">
                    <input id="telefon" name="telefon" placeholder="0049 1234 513123" class="form-control input-md"
                           type="text" value="<?php print $tenant_info['phone']; ?>">
                    <span class="help-block" style="font-size:11px">Für Rückfragen, bei Nummern aus AT/CH bitte mit Landesvorwahl</span>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="betreff">Betreff</label>
                <div class="col-md-4">
                    <select id="betreff" name="betreff" class="form-control">
                        <option value="Einfache Frage">Einfache Frage</option>
                        <option value="Zum Vertrag">Zum Vertrag</option>
                        <option value="Kontolöschung">Bitte löschen Sie mein Konto</option>
                        <option value="Abrechnung / Billing">Abrechnung / Billing</option>
                        <option value="Feedback">Feedback</option>
                        <option value="Sonstiges">Sonstiges</option>
                    </select>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="anfrage">Ihre Anfrage</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="anfrage" name="anfrage"
                              style="height: 200px;">Wer? Wie? Wo? Was?</textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="submit" class="btn btn-primary">Absenden</button>
                </div>
            </div>

        </fieldset>
    </form>


</div>
