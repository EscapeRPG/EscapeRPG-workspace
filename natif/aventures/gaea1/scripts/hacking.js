const consoleInput = document.getElementById("prompt");
const consoleOutput = document.getElementById("console-output");
const inputShadow = document.getElementById("input-shadow");
const bulleMarv = document.getElementById("bullemarv");
const terminal = document.getElementById("terminal-wrap");
let mappse = false,
  filse = false;

adjustInputWidth(consoleInput.value);

terminal.addEventListener("click", inputFocus);

function inputFocus() {
  consoleInput.focus();
}

consoleInput.addEventListener("input", function () {
  inputShadow.textContent = this.value || "";
  adjustInputWidth(this.value);
});

consoleInput.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    const command = this.value.trim();

    if (command) {
      consoleOutput.innerHTML +=
        '<span class="blue">SYSTEM</span> > <i>' + command + "</i>";
      this.value = "";
      consoleOutput.scrollTop = consoleOutput.scrollHeight;
      setTimeout(
        handleCommand,
        Math.floor(Math.random() * (500, 1100) + 500),
        command
      );
      adjustInputWidth(this.value);
    }
  }
});

function adm() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Missen instruksjon fa <i>adm</i></span></div>';
  bulleMarv.innerHTML = `<p>N'oubliez pas que la commande "<b>adm</b>" doit être suivie d'une instruction.</p>`;
}

function admLst() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/dok</span>
<span class="blue">/log</span>
<span class="blue">/sys</span>
<span class="blue">/usr</span>
</div>`;
  bulleMarv.innerHTML = `<p>${
    mappse
      ? ""
      : 'Si je comprends bien, le mot "mappse" doit signifier "dossiers".'
  }
Pour parcourir l'un de ces dossiers, tapez "--lst /dossier" pour voir son contenu.<br>
<br>
Des dossiers ou fichiers cachés peuvent parfois être présents.<br>
Pour les afficher, terminez votre commande par "<b>-a</b>".
</p>`;
  mappse = true;
}

function admLstA() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/dok</span>
<span class="blue">/log</span>
<span class="blue">/sys</span>
<span class="blue">/usr</span>
</div>`;
  bulleMarv.innerHTML = `<p>Il ne semble pas y avoir de dossier ou de fichier caché ici.</p>`;
}

function admLstDok() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/prs</span></div>
<div>/// Filse :
<span class="blue">/kontrakt.doc</span>
<span class="blue">/misjon_raport.txt</span>
<span class="blue">/sekurit_protokol.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Ce répertoire me semble bien vide... Peut-être y a-t-il des fichiers cachés ?
</p>`;
  filse = true;
}

function admLstDokA() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/krp</span>
<span class="blue">/prs</span></div>
<div>/// Filse :
<span class="blue">/kontrakt.doc</span>
<span class="blue">/misjon_raport.txt</span>
<span class="blue">/sekurit_protokol.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Le dossier "/krp" n'était pas affiché précédemment. Il peut être intéressant de consulter son contenu.
</p>`;
  filse = true;
}

function admLstDokKrp() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/dekrypter.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Essayons de lire ce fichier !
</p>`;
  filse = true;
}

function admLstDokKrpA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/dekrypter.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Il ne semble y avoir qu'un seul fichier ici. Essayons de le lire !
</p>`;
  filse = true;
}

function admLstDokPrs() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/membrese_list.db</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Sans doute la liste des membres d'équipage.
</p>`;
  filse = true;
}

function admLstDokPrsA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/membrese_list.db</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Il ne semble y avoir qu'un seul fichier ici. Sans doute la liste des membres d'équipage.
</p>`;
  filse = true;
}

function admLstLog() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/logs.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Les logs du vaisseau. Sans avoir traduit la langue de cette station, je doute que nous en tirions quoi que ce soit d'utile.
</p>`;
  filse = true;
}

function admLstLogA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/logs.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Les logs du vaisseau. Sans avoir traduit la langue de cette station, je doute que nous en tirions quoi que ce soit d'utile.<br>
Il ne semble pas y avoir d'autre fichier ici.
</p>`;
  filse = true;
}

function admLstSys() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/drivers</span>
<span class="blue">/karantn</span></div>
<div>/// Filse :
<span class="blue">/aksess.db</span>
<span class="blue">/konfig.sys</span>
<span class="blue">/sekurit.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
La plupart de ces fichiers doivent être rédigés dans la langue de cette station, je ne suis pas certain que l'on pourra y trouver quelque chose.
</p>`;
  filse = true;
}

function admLstSysA() {
  consoleOutput.innerHTML += `<div>/// Mappse :
<span class="blue">/drivers</span>
<span class="blue">/karantn</span></div>
<div>/// Filse :
<span class="blue">/aksess.db</span>
<span class="blue">/konfig.sys</span>
<span class="blue">/sekurit.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
La plupart de ces fichiers doivent être rédigés dans la langue de cette station, je ne suis pas certain que l'on pourra y trouver quelque chose.<br>
Apparemment, il n'y a pas de fichier caché.
</p>`;
  filse = true;
}

function admLstSysDrivers() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/komunodek.dll</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Les drivers du terminal. Tenter de les consulter ne nous apportera rien, et chercher à les modifier risquerait de tout simplement casser cette machine. Mieux vaut éviter.
</p>`;
  filse = true;
}

function admLstSysDriversA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/komunodek.dll</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Les drivers du terminal. Tenter de les consulter ne nous apportera rien, et chercher à les modifier risquerait de tout simplement casser cette machine. Mieux vaut éviter.<br>
Apparemment, il n'y a pas de fichier caché.
</p>`;
  filse = true;
}

function admLstSysKarantn() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/situasjon.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Sans doute un rapport sur la situation de la station. "Karantn" doit vouloir dire "quarantaine".
</p>`;
  filse = true;
}

function admLstSysKarantnA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/situasjon.log</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Sans doute un rapport sur la situation de la station. "Karantn" doit vouloir dire "quarantaine".<br>
Il n'y a pas d'autre fichier ici.
</p>`;
  filse = true;
}

function admLstUsr() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/lie_aaron.dat</span>
<span class="blue">/lund_inge.dat</span>
<span class="blue">/madsen_ana.dat</span>
<span class="blue">/palladio_sylvia.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Des informations sur certains membres de l'équipage. Nous pouvons peut-être récupérer leurs identifiants ?
</p>`;
  filse = true;
}

function admLstUsrA() {
  consoleOutput.innerHTML += `<div>/// Filse :
<span class="blue">/hyrd_angus.dat</span>
<span class="blue">/lie_aaron.dat</span>
<span class="blue">/lund_inge.dat</span>
<span class="blue">/madsen_ana.dat</span>
<span class="blue">/palladio_sylvia.dat</span>
</div>`;
  bulleMarv.innerHTML =
    (filse
      ? `<p>`
      : `<p>Si je comprends bien, le mot "filse" doit signifier "fichiers". `) +
    `
Des informations sur certains membres de l'équipage. Nous pouvons peut-être récupérer leurs identifiants ?<br>
Le fichier d'Angus Hyrd semble être un fichier caché. Sans doute une personne très importante à bord, comme le commandant.
</p>`;
  filse = true;
}

function admLsr() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Missen instruksjon fa <i>lesr</i></span></div>';
  bulleMarv.innerHTML = `<p>N'oubliez pas que la commande "<b>--lesr</b>" doit être suivie d'un nom de dossier et d'un nom de fichier avec on extension.</p>`;
}

function admLsrDekrypter() {
  consoleOutput.innerHTML += `<div>/// 
Alle passordse er krypt meden kryptkei. User komund "--dkryptr=passord/lxt-54" fa dekrypt.
</div>`;
  bulleMarv.innerHTML = `<p>
Apparemment, les mots de passe des utilisateurs sont cryptés. La commande donnée dans le fichier permet de les lire correctement en remplaçant "passord" par le mot de passe à déchiffrer.
</p>`;
}

function admLsrMembreseList() {
  consoleOutput.innerHTML += `<div>/// Membrese list :<br>
- Angus Hyrd : komunt - ded<br>- Inge Lund : sekunkomunt - uknen<br>
- Aaron Lie : offiser - uknen<br>- Ana Madsen : offiser - uknen<br>
- Sylvia Palladio : offiser - uknen<br>- Frederik Jensen : liessonoffiser - uknen<br>
- Olaf Tangen : liessonoffiser - uknen<br>- Thea Amundsen : vitenskapoffiser - uknen<br>
- Mari Nobile : vitenskapoffiser - uknen<br>- Gustav Amundsen : vitenskapman - uknen<br>
- Félis Andersen : vitenskapman - uknen<br>- Ollie Agosto : vitenskapman - uknen<br>
- Maria Benedetii : vitenskapviman - uknen<br>- Laura Cappo : vitenskapviman - uknen<br>
- Hans Falstad : vitenskapman - uknen<br>- Emil Forde : vitenskapman - uknen<br>
- Isabella Galante : vitenskapviman - uknen<br>- Valentino Giovanini : vitenskapman - uknen<br>
- Hub Kalberg : vitenskapman - uknen<br>- Paulo Laugen : vitenskapman - uknen<br>
- Olaf Sandvig : vitenskapman - uknen<br>- Paulo Seneca : vitenskapman - uknen<br>
- William Thumb : vitenskapman - uknen<br>- Anders Valle : vitenskapman - uknen<br>
- Emma Ciuffo : sykkeviman - uknen<br>- Ingrid Folland : sykkeviman - uknen<br>
- Hans Fredriksen : sykkeman - uknen<br>- Vera Opland : sykkeviman - uknen<br>
- Ygritt Knutsen : psysykkeviman - uknen<br>- Frank Brager : pilot - uknen<br>
- Isa Torello : pilot - uknen<br>- Melina Faustini : sjefspesviman - uknen<br>
- Olaf Hegstad : sjefspesman - uknen<br>- Valeri Tyrol : heldsjef - uknen<br>
- Alessi Galante : heldman - uknen<br>- Elena Imparato : heldviman - uknen<br>
- Isak Kallestad : heldman - uknen<br>- Mikkel Kallestad : heldman - uknen<br>
- Gregorio Nuti : heldman - uknen<br>- Rafael Osso : heldman - uknen<br>
- Paulo Ricci : heldman - uknen<br>- Fredrik Rye : heldman - uknen<br>
- Ingrid Wollen : heldviman - uknen<br>- Enzio Cappo : sivil - uknen<br>
- Tobias Amundsen : sivil - uknen<br>- Niki Lie : sivil - uknen<br>
- Claudia Nuti : sivil - uknen<br>- Andrea Opland : sivil - uknen<br>
- Alexander Osso : sivil - uknen<br>- Astrid Osso : sivil - uknen<br>
- Giuliana Osso : sivil - uknen<br>- Hilde Palladio : sivil - uknen<br>
- Karl Palladio : sivil - uknen<br>- Anita Sandvig : sivil - uknen<br>
- Dario Sandvig : sivil - uknen<br>- Brina Tangen : sivil - uknen<br>
- Marco Torello : sivil - uknen<br>- Asger Wollen : sivil - uknen<br>
</div>`;
  bulleMarv.innerHTML = `<p>La liste du personnel de la station.</p>`;
}

function admLsrKontrakts() {
  consoleOutput.innerHTML += `<div>/// 
GAEA-I vitenskapstasjon kontrakt meden kompania PROGENER.<br>
Nat kontrakt melo GAEA-I e PROGENER da tut mak to GAEA-I fa estrakt resurs fro nar plant.<br><br>
Art. 1 - Risutatse fro ricercse er PROGENER prodommen.<br>
Tut vitaform trova o plantflat moser vare ifomar to supotoritatt. Supotoritatt dara instruksjonse a gatitt to GAEA-I komunt.
Instruksjonse norespekt gara legalprosutse e komunt vara utesent sen dom.<br> <br>
Art. 2 - GAEA-I resdentse noparlara ricercse osom.<br>
Artikl norespekt gara legalprosutse e[...]
</div>`;
  bulleMarv.innerHTML = `<p>Beaucoup de jargon administratif, j'imagine. Je ne pense pas que cela nous aide beaucoup, surtout sans traduction possible...</p>`;
}

function admLsrMisjonRaport() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Fil korott</span></div>';
  bulleMarv.innerHTML = `<p>Il semblerait que ce fichier soit corrompu. Impossible de le lire.</p>`;
}

function admLsrSekuritProtkol() {
  consoleOutput.innerHTML += `<div>/// 
Icase nodsituasjon, alle stasjon vara vicint isam meden protkol 66. Komunt e sekunkomunt er solpodse a dar es orde, e kaner dari a tutsom icase necessar.<br>
Fa mo ifomarsjon, leser kontrakt.
</div>`;
  bulleMarv.innerHTML = `<p>Des instructions à suivre en cas de protocole de sécurité, j'imagine. Il est difficile de savoir de quoi il en retourne exactement avec ce langage.</p>`;
}

function admLsrLogs() {
  consoleOutput.innerHTML += `<div>/// 7 lasdaggse logs :<br>
- 7 daggsesid : Skitt sent a Gaea. Flor studmisjon e provse rekpersjon. T. Amundsen, M. Nobile, H. Kalberg, P. Seneca, F. Brager, I. Kallestad.
Nodrop : vitasigse loss P. Seneca. Nodrop : vitasigse rekper P. Seneca. Nodrop : vitasigse kritk P. Seneca.
Misjon kansel. P. Seneca rekper a stasjon. Tatt pa sykkeman H. Fredriksen.<br><br>
- 6 daggsesid : Nodrop : vitasigse loss P. Seneca. Nodrop : karantnprotkol engasjer.
Labratrum A vicint. Membrese vicinte : T. Amundsen, M. Nobile, H. Kalberg, O. Agosto, L. Cappo, V. Giovanini, P. Laugen, O. Sandvig, H. Fredriksen, F. Brager, I.Kallestad.
Nodrop : vitasigse loss T. Amundsen, M. Nobile, H. Kalberg, O. Agosto, L. Cappo, V. Giovanini, P. Laugen, O. Sandvig, H. Fredriksen, F. Brager, I.Kallestad.<br><br>
- 4 daggsesid : Nodrop : karantnrott. Labratrum A.
Nodrop : vitasigse loss. 23 opdatse. A. Lie, G. Amundsen, F. Andersen, M. Benedetti, H. Falstad, E. Forde, I. Galante, W. Thumb, A. Valle, E. Ciuffo, I. Folland, V. Opland,
Y. Knutsen, O. Hegstad, A. Galante, R. Osso, F. Rye, I. Wollen, T. Amundsen, A. Opland, H. Palladio, K. Palladio, B. Tange, A. Wollen.<br><br>
- 3 daggsesid : Nodrop : vitasigse loss. 20 opdatse. I. Lund, A. Madsen, S. Palladio, F. Jensen, O. Tangen, I. Torello, M. Faustini, V. Tyrol, E. Imparato, M. Kallestad, G. Nuti,
P. Nicci, E. Cappo, N. Lie, C. Nuti, A. Osso, A. Osso, G. Osso, A. Sandvig, D. Sandvig, M. Torello.
Nodropen sent fa nodfrekens. Otor : A. Hyrd, komunt. Nodprotkol engasjer, stasjonkarantnon.
Fel dorvicint kurdior A, kurdior C, kurdior F, legerrum, pricirum, sykkerum, labratum A, raktrrum. Salvmodulvicint.
Nodrop : autodestruktprotkol engasjer. Nodrop : autodestruktprotkol desengasjer. Nodrop : vitasigse kritk. A. Hyrd. Nodrop : membreded. A. Hyrd.<br><br>
- 22 horse 37 mintse 18 sekundse : Nodrop : lo enersji, raktrovv, salvraktron.<br><br>
- 11 mint 24 sekundse : Komunodek termnal koneksjon.
</div>`;
  bulleMarv.innerHTML = `<p>Difficile de dire précisément ce qu'il s'est passé dernièrement sans traducteur, mais j'ai l'impression que l'ensemble de l'équipage est cité ici.</p>`;
}

function admLsrKomunodek() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Kant opner fil : formt ikelesebil</span></div>';
  bulleMarv.innerHTML = `<p>Il semblerait que ce fichier ne puisse être lu par cette console.</p>`;
}

function admLsrSituasjon() {
  consoleOutput.innerHTML += `<div>/// 7 lasdaggse karantn situasjon :<br>
- 6 daggsesid : Karantnprotkol engasjer. Labratrum A vicint.
Membrese vicinte : T. Amundsen, M. Nobile, H. Kalberg, O. Agosto, L. Cappo, V. Giovanini, P. Laugen, O. Sandvig, H. Fredriksen, F. Brager, I.Kallestad.<br><br>
- 4 daggsesid : Karantnrott. Labratrum A.<br><br>
- 3 daggsesid : Nodprotkol engasjer, stasjonkarantnon. Fel dorvicint kurdior A, kurdior C, kurdior F, legerrum, pricirum, sykkerum, labratum A, raktrrum. Salvmodulvicint.<br><br>
Karantnprotkol alti on.
</div>`;
  bulleMarv.innerHTML = `<p>
Au vu de la situation actuelle et de ce que nous avons pu voir à bord, j'en conclue que le protocole de quarantaine a été enclenché il y a 6 jours et qu'il est toujours en place depuis.<br>
En revanche, je ne saurais dire ce qui s'est passé entre-temps, mais il semble y avoir plusieurs mises à jour de la situation.
</p>`;
}

function admLsrAksess() {
  consoleOutput.innerHTML += `<div>/// Membrese aksess lever :<br>
- Angus Hyrd : A<br>- Inge Lund : A<br>
- Aaron Lie : A<br>- Ana Madsen : A<br>
- Sylvia Palladio : A<br>- Frederik Jensen : A<br>
- Olaf Tangen : A<br>- Thea Amundsen : A<br>
- Mari Nobile : A<br>- Gustav Amundsen : A<br>
- Félis Andersen : B<br>- Ollie Agosto : B<br>
- Maria Benedetii : B<br>- Laura Cappo : B<br>
- Hans Falstad : B<br>- Emil Forde : B<br>
- Isabella Galante : B<br>- Valentino Giovanini : B<br>
- Hub Kalberg : B<br>- Paulo Laugen : B<br>
- Olaf Sandvig : B<br>- Paulo Seneca : B<br>
- William Thumb : B<br>- Anders Valle : B<br>
- Emma Ciuffo : B<br>- Ingrid Folland : B<br>
- Hans Fredriksen : B<br>- Vera Opland : B<br>
- Ygritt Knutsen : B<br>- Frank Brager : C<br>
- Isa Torello : C<br>- Melina Faustini : D<br>
- Olaf Hegstad : D<br>- Valeri Tyrol : C<br>
- Alessi Galante : D<br>- Elena Imparato : D<br>
- Isak Kallestad : D<br>- Mikkel Kallestad : D<br>
- Gregorio Nuti : D<br>- Rafael Osso : D<br>
- Paulo Ricci : D<br>- Fredrik Rye : D<br>
- Ingrid Wollen : D<br>- Enzio Cappo : E<br>
- Tobias Amundsen : E<br>- Niki Lie : E<br>
- Claudia Nuti : E<br>- Andrea Opland : E<br>
- Alexander Osso : E<br>- Astrid Osso : E<br>
- Giuliana Osso : E<br>- Hilde Palladio : E<br>
- Karl Palladio : E<br>- Anita Sandvig : E<br>
- Dario Sandvig : E<br>- Brina Tangen : E<br>
- Marco Torello : E<br>- Asger Wollen : E<br>
</div>`;
  bulleMarv.innerHTML = `<p>
La liste des autorisations d'accès du personnel. Avec le pass que vous avez trouvé, nous avons le plus haut niveau d'accès possible.
Une fois le courant remis dans la station, nous devrions pouvoir accéder à n'importe quelle salle.
</p>`;
}

function admLsrKonfig() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Forbit instruksjon</span></div>';
  bulleMarv.innerHTML = `<p>
Il semblerait que ce fichier soit totalement protégé pour des mesures de sécurité. Tenter de l'ouvrir et de le modifier pourrait avoir des effets désastreux sur cette machine, nous devrions laisser ça.
</p>`;
}

function admLsrSekurit() {
  consoleOutput.innerHTML += `<div>/// 7 lasdaggse koneksjonse :<br>
- 7 daggsesid : A. Hyrd, I. Lund.<br><br>
- 6 daggsesid : A. Hyrd, I. Lund.<br><br>
- 5 daggsesid : A. Hyrd.<br><br>
- 4 daggsesid : A. Hyrd, I. Lund.<br><br>
- 3 daggsesid : A. Hyrd.<br><br>
- 11 mintse 24 sekundse : Uknen.
</div>`;
  bulleMarv.innerHTML = `<p>Les logs de connexion à ce terminal des 7 derniers jours. La dernière entrée nous représente, mais le reste semble indiquer que personne ne s'est connecté depuis 3 jours...</p>`;
}

function admLsrHyrd() {
  consoleOutput.innerHTML += `<div>/// ANGUS HYRD<br>
- Nam : <span class="blue">HYRD</span><br>
- Prinam : <span class="blue">Angus</span><br>
- Rol : <span class="blue">Komunt</span><br>
- ID : <span class="blue">a_hyrd_xbp718</span><br>
- Passord : <span class="blue">hmpo62x4sdr</span>
</div>`;
  bulleMarv.innerHTML = `<p>Nous devrions maintenant avoir tout ce dont nous avons besoin pour nous connecter au terminal.</p>`;
  fetch("/escaperpg/aventures/gaea1/includes/update_session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      action: "add_session",
      item: ["a_hyrd_xbp718", "hmpo62x4sdr"],
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateDataList();
      }
    });
}

function admLsrAaron() {
  consoleOutput.innerHTML += `<div>/// AARON LIE<br>
- Nam : <span class="red">Err : Data korott</span><br>
- Prinam : <span class="blue">Aaron</span><br>
- Rol : <span class="blue">Offiser</span><br>
- ID : <span class="red">Err : Data korott</span><br>
- Passord : <span class="blue">dgi4s2ndwfp2</span>
</div>`;
  bulleMarv.innerHTML = `<p>Sans l'identifiant de cette personne, nous ne pourrons avancer. Peut-être avec les données de quelqu'un d'autre ?</p>`;
}

function admLsrInge() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Fil korott</span></div>';
  bulleMarv.innerHTML = `<p>Il semblerait que ce fichier soit corrompu. Impossible de le consulter.</p>`;
}

function admLsrAna() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Fil korott</span></div>';
  bulleMarv.innerHTML = `<p>Il semblerait que ce fichier soit corrompu. Impossible de le lire en l'état.</p>`;
}

function admLsrSylvia() {
  consoleOutput.innerHTML += `<div>/// SYLVIA PALLADIO<br>
- Nam : PALLADIO<br>
- Prinam : <span class="red">Err : Data korott</span><br>
- Rol : <span class="red">Err : Data korott</span><br>
- ID : s_palladio_56brf92g<br>
- Passord : <span class="red">Err : Data korott</span>
</div>`;
  bulleMarv.innerHTML = `<p>Sans le mot de passe de cette personne, nous ne risquons pas d'aller bien loin.</p>`;
}

function admDekryptHyrd() {
  consoleOutput.innerHTML += `<div>/// DEKRYPTER :<br>
Passord : <span class="blue">GAEA-I_KomuntHyrd</span>
</div>`;
  bulleMarv.innerHTML = `<p>Parfait, nous connaissons maintenant le mot de passe décrypté du commandant ! Plus qu'à nous connecter à présent.</p>`;
  fetch("/escaperpg/aventures/gaea1/includes/update_session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      action: "add_session",
      item: ["GAEA-I_KomuntHyrd"],
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateDataList();
      }
    });
  fetch("/escaperpg/aventures/gaea1/includes/update_session.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      action: "remove_session",
      item: ["hmpo62x4sdr"],
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateDataList();
      }
    });
}

function admDekryptAaron() {
  consoleOutput.innerHTML += `<div>/// DEKRYPTER :<br>
Passord : <span class="blue">0ff1s3r_713</span>
</div>`;
  bulleMarv.innerHTML = `<p>Nous avons un mot de passe décrypté, mais les données de l'identifiant étant corrompues, je doute qu'il puisse nous servir.</p>`;
}

function admClr() {
  consoleOutput.innerHTML = "";
  bulleMarv.innerHTML = `<p>Ça fait parfois du bien de faire le ménage. N'oubliez pas la commande "<b>--hlp</b>" si vous voulez de l'aide.</p>`;
}

function admHlp() {
  consoleOutput.innerHTML += `<div>/// Autoris komundse :
<span class="blue">adm</span>
<span class="blue">--lst</span>
<span class="blue">--lesr</span>
<span class="blue">--clr</span>
<span class="blue">--hlp</span>
</div>`;
  bulleMarv.innerHTML = `<p>
Parfait, je pense savoir à quoi tout cela correspond :<br>
<br>
- "<b>adm</b>" permet d'utiliser la fonction d'administrateur. Il faut faire suivre cette commande par l'instruction désirée.<br>
<br>
- "<b>--lst</b>" fait référence à "liste", afin d'afficher les différents dossiers présents sur la machine, ou les fichiers dans les dossiers si vous suivez cette commande par "<b>/dossier</b>".<br>
<br>
- "<b>--lesr</b>" doit vouloir signifier "lire", pour afficher le contenu d'un fichier. Pour ce faire, vous devez entrer la commande "<b>--lesr /dossier/sous-dossier/fichier.extension</b>".<br>
<br>
- "<b>--clr</b>" permet de vider la console, si vous désirez repartir à zéro.<br>
<br>
N'hésitez pas à réutiliser la commande "<b>--hlp</b>" si vous voulez retrouver cette instruction et mes explications.<br>
<br>
Notez bien que chaque instruction différente doit être précédée d'un espace, comme dans l'exemple suivant :<br>
"<b>adm</b> <i>espace</i> <b>--lesr</b> <i>espace</i> <b>/dossier/sous-dossier/fichier.extension</b> <i>espace</i> <b>instruction</b>".
</p>`;
}

function lsrDekrypter() {
  consoleOutput.innerHTML +=
    '<div><span class="red">/// Err : Forbit instruksjon : administratorret necessar</span></div>';
  bulleMarv.innerHTML = `<p>Il semblerait que ce fichier soit protégé en lecture. Essayez de le lire avec les droits d'administrateur.</p>`;
}

function adjustInputWidth(text) {
  inputShadow.textContent = text || "";
  const width = inputShadow.offsetWidth + 10;
  consoleInput.style.width = Math.max(width, 10) + "px";
}

const commandMap = {
  adm: adm,
  "adm --lst": admLst,
  "adm --lst -a": admLstA,
  "adm --lst /dok": admLstDok,
  "adm --lst /dok -a": admLstDokA,
  "adm --lst /dok/krp": admLstDokKrp,
  "adm --lst /dok/krp -a": admLstDokKrpA,
  "adm --lst /dok/prs": admLstDokPrs,
  "adm --lst /dok/prs -a": admLstDokPrsA,
  "adm --lst /log": admLstLog,
  "adm --lst /log -a": admLstLogA,
  "adm --lst /sys": admLstSys,
  "adm --lst /sys -a": admLstSysA,
  "adm --lst /sys/drivers": admLstSysDrivers,
  "adm --lst /sys/drivers -a": admLstSysDriversA,
  "adm --lst /sys/karantn": admLstSysKarantn,
  "adm --lst /sys/karantn -a": admLstSysKarantnA,
  "adm --lst /usr": admLstUsr,
  "adm --lst /usr -a": admLstUsrA,
  "adm --lesr": admLsr,
  "adm --lesr /dok/prs/membrese_list.db": admLsrMembreseList,
  "adm --lesr /dok/kontrakt.doc": admLsrKontrakts,
  "adm --lesr /dok/misjon_raport.txt": admLsrMisjonRaport,
  "adm --lesr /dok/sekurit_protokol.dat": admLsrSekuritProtkol,
  "adm --lesr /log/logs.log": admLsrLogs,
  "adm --lesr /sys/drivers/komunodek.dll": admLsrKomunodek,
  "adm --lesr /sys/karantn/situasjon.log": admLsrSituasjon,
  "adm --lesr /sys/aksess.db": admLsrAksess,
  "adm --lesr /sys/konfig.sys": admLsrKonfig,
  "adm --lesr /sys/sekurit.log": admLsrSekurit,
  "adm --lesr /usr/hyrd_angus.dat": admLsrHyrd,
  "adm --lesr /usr/lie_aaron.dat": admLsrAaron,
  "adm --lesr /usr/lund_inge.dat": admLsrInge,
  "adm --lesr /usr/madsen_ana.dat": admLsrAna,
  "adm --lesr /usr/palladio_sylvia.dat": admLsrSylvia,
  "adm --dkryptr=hmpo62x4sdr/lxt-54": admDekryptHyrd,
  "adm --dkryptr=dgi4s2ndwfp2/lxt-54": admDekryptAaron,
  "adm --clr": admClr,
  "adm --hlp": admHlp,
  "--lst": admLst,
  "--lst -a": admLstA,
  "--lst /dok": admLstDok,
  "--lst /dok -a": admLstDokA,
  "--lst /dok/krp": admLstDokKrp,
  "--lst /dok/krp -a": admLstDokKrpA,
  "--lst /dok/prs": admLstDokPrs,
  "--lst /dok/prs -a": admLstDokPrsA,
  "--lst /log": admLstLog,
  "--lst /log -a": admLstLogA,
  "--lst /sys": admLstSys,
  "--lst /sys -a": admLstSysA,
  "--lst /sys/drivers": admLstSysDrivers,
  "--lst /sys/drivers -a": admLstSysDriversA,
  "--lst /sys/karantn": admLstSysKarantn,
  "--lst /sys/karantn -a": admLstSysKarantnA,
  "--lst /usr": admLstUsr,
  "--lst /usr -a": admLstUsrA,
  "--lesr": admLsr,
  "--lesr /dok/krp/dekrypter.dat": lsrDekrypter,
  "--lesr /dok/prs/membrese_list.db": admLsrMembreseList,
  "--lesr /dok/kontrakt.doc": admLsrKontrakts,
  "--lesr /dok/misjon_raport.txt": admLsrMisjonRaport,
  "--lesr /dok/sekurit_protokol.dat": admLsrSekuritProtkol,
  "--lesr /log/logs.log": admLsrLogs,
  "--lesr /sys/drivers/komunodek.dll": admLsrKomunodek,
  "--lesr /sys/karantn/situasjon.log": admLsrSituasjon,
  "--lesr /sys/aksess.db": admLsrAksess,
  "--lesr /sys/konfig.sys": admLsrKonfig,
  "--lesr /sys/sekurit.log": admLsrSekurit,
  "--lesr /usr/hyrd_angus.dat": admLsrHyrd,
  "--lesr /usr/lie_aaron.dat": admLsrAaron,
  "--lesr /usr/lund_inge.dat": admLsrInge,
  "--lesr /usr/madsen_ana.dat": admLsrAna,
  "--lesr /usr/palladio_sylvia.dat": admLsrSylvia,
  "--dkryptr=hmpo62x4sdr/lxt-54": admDekryptHyrd,
  "--dkryptr=dgi4s2ndwfp2/lxt-54": admDekryptAaron,
  "--clr": admClr,
  "--hlp": admHlp,
};

function handleCommand(command) {
  const handler = commandMap[command];

  if (handler) {
    handler();
  } else if (command.startsWith("adm")) {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen instruksjon</span></div>';
    bulleMarv.innerHTML = `<p>N'oubliez pas de faire suivre votre instruction "<b>adm</b>" par une suite d'instructions correcte.</p>`;
  } else if (command.startsWith("--lst")) {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen mapp</span></div>';
    bulleMarv.innerHTML = `<p>Apparemment, le dossier que vous essayez de consulter n'existe pas..</p>`;
  } else if (command.startsWith("--lesr")) {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen fil</span></div>';
    bulleMarv.innerHTML = `<p>Il semblerait que le fichier que vous cherchez à consulter n'existe pas.</p>`;
  } else if (command.startsWith("--clr")) {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen instruksjon</span></div>';
    bulleMarv.innerHTML = `<p>Pour effacer la console, écrivez simplement "<b>--clr</b>" avec aucune autre instruction.</p>`;
  } else if (command.startsWith("--hlp")) {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen instruksjon</span></div>';
    bulleMarv.innerHTML = `<p>Pour consulter les commandes disponibles, écrivez simplement "<b>--hlp</b>" avec aucune autre instruction.</p>`;
  } else {
    consoleOutput.innerHTML +=
      '<div><span class="red">/// Err : Uknen instruksjon</span></div>';
    bulleMarv.innerHTML = `<p>Il semblerait que l'instruction que vous avez demandée n'existe pas.</p>`;
  }

  consoleOutput.scrollTop = consoleOutput.scrollHeight;
}
