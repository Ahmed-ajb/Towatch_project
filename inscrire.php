
	<title>INSCRIPTION</title>
    <link href="style1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsive.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<body style=" position: relative; top: 435px">

<div class="signup__container">
    <div class="container__child signup__thumbnail">
      <div class="thumbnail__logo">
           <img width="210" src="images/logo/logo.png" alt="#"  style="
           position: relative;
    top: 201px;
    right: -46px; width:245px" />
      
       
      
      </div>

      <div class="thumbnail__content text-center">
        
        <h2 class="heading--secondary" style="font-family: sans-serif;     font-family: script mt;
       font-family: script mt;
    top: 80px;
    position: relative;
    top: 157px;
    right: -32px;">Êtes-vous prêt à nous joindre?</h2>
    
        <h2 class="heading--primary" style="position: relative;
    right: -29px;
    top: -169px;
    font-family: Script MT;
    font-size: revert;">——Your movies to watch——</h2>
      </div>
      
      <div class="signup__overlay" style="   background: url(images/logo/cinema.jpeg); filter: blur(2px);
}"></div>
    </div>
    <div class="container__child signup__form">
      
      <form action="inscription.php" method="POST">
        <div class="form-group" style="position: relative; top: 16px">
          <label for="username">Nom et Prénom</label>
          <input class="form-control" type="text" name="username" id="username" placeholder="Votre Nom et Prénom" style="position: relative; top: 23px; left: -117px"required />
        </div>
        <div class="form-group" style="position: relative; top: 45px">
          <label for="email">Email</label>
          <input class="form-control" type="text" name="email" id="email" placeholder="Votre E-mail" style="position: relative; top: 25px; left: -44px" required />
        </div>
        <div class="form-group" style="position: relative; top: 64px ">
          <label for="password" style="position: relative; top: 15px">Mot de passe</label>
          <input class="form-control" type="password" name="password" id="password" placeholder="********" style="position: relative; top: 39px; left: -99px" required />
        </div>
        <div class="form-group" style="position: relative; top: 59px ">
          <label for="Date" style="position: relative; top: 50px">Date de Naissance</label>
          <input class="form-control" type="Date" name="Date" id="Date de Naissance" placeholder="jj/mm/aaaa"  style="position: relative; top: 76px; left: -134px;    width: 171px" required />
        </div>
        <div class="form-group" style="position: relative; top: 62px ">
     <label class="label_field"  style="position: relative; top: 81px">Sexe</label>
     <select  name="sexe"  style="position: relative; top: 104px; left: -35px; width:113px">
     <option value="H">Homme</option>
     <option value="F">Femme</option>
      <option value="G">Autre</option>
     </select>
    </div>
          <div class="form-group" style="position: relative; top: 159px ">
     <label class="label_field"  style="position: relative; top: 12px">Profession</label>
     <select  name="profession" id="prof" style="position: relative; top: 39px; left: -86px">
  <option value="ADM">Administrateur</option>
  <option value="ART">Artiste</option>
  <option value="MED">Médecin</option>
  <option value="EDU">Educateur</option>
  <option value="ING">Ingénieur</option>
  <option value="DIV">Divertissement</option>
  <option value="EXE">Exécutif</option>
  <option value="SAN">Santé</option>
  <option value="MEN">Ménagere</option>
  <option value="AVO">Avocat</option>
  <option value="BIB">Bibliothécaire</option>
  <option value="MAR">Marketing</option>
  <option value="PRO">Programmeur</option>
  <option value="RET">Retraité</option>
  <option value="VEN">Vendeur</option>
  <option value="SAV">Savant</option>
  <option value="ETU">Etudiant</option>
  <option value="TEC">Technicien</option>
  <option value="ECR">Ecrivain</option>
  <option value="AUT">Autre</option>
  <option value="AUC">Aucun</option>
  </select>
             </div>
        <div class="form-group" style="position: relative; top: 179px ">
     <label class="label_field"  style="position: relative; top: 23px">pays</label>
     <select required="required" name="pays"  style="position: relative; top: 47px; left: -35px">
  <option value="MAR">Maroc</option>
  <option value="AFG">Åfghanistan</option>
  <option value="ALB">Albanie</option>
  <option value="DZA">Algérie</option>
  <option value="ASM">Samoa</option>
  <option value="AND">Andorre</option>
  <option value="AGO">Angola</option>
  <option value="AIA">Anguilla</option>
  <option value="ATA">Antarctique</option>
  <option value="ARG">Argentine</option>
  <option value="ARM">Arménie</option>
  <option value="ABW">Aruba</option>
  <option value="AUS">Australie</option>
  <option value="AUT">Autriche</option>
  <option value="AZE">Azerbaïdjan</option>
  <option value="BHS">Bahamas</option>
  <option value="BHR">Bahrain</option>
  <option value="BGD">Bangladesh</option>
  <option value="BRB">Barbade</option>
  <option value="BLR">Belarus</option>
  <option value="BEL">Belgique</option>
  <option value="BLZ">Belize</option>
  <option value="BEN">Bénin</option>
  <option value="BMU">Bermuda</option>
  <option value="BTN">Bhutan</option>
  <option value="BOL">Bolivie</option>
  <option value="BWA">Botswana</option>
  <option value="BVT">Île Bouvet</option>
  <option value="BRA">Brésil</option>
  <option value="BGR">Bulgarie</option>
  <option value="BFA">Burkina Faso</option>
  <option value="BDI">Burundi</option>
  <option value="KHM">Cambodge</option>
  <option value="CMR">Cameroun</option>
  <option value="CAN">Canada</option>
  <option value="CPV">Cap-Vert</option>
  <option value="CYM">Îles Caïmans</option>
  <option value="CHL">Chili</option>
  <option value="CHN">Chine</option>
  <option value="COL">Colombie</option>
  <option value="COM">Comores</option>
  <option value="COG">Congo</option>
  <option value="CUB">Cuba</option>
  <option value="CUW">Curaçao</option>
  <option value="DNK">Danemark</option>
  <option value="DJI">Djibouti</option>
  <option value="DMA">Dominique</option>
  <option value="ECU">Équateur</option>
  <option value="EGY">Égypte</option>
  <option value="SLV">El Salvador</option>
  <option value="ERI">Érythrée</option>
  <option value="EST">Estonie</option>
  <option value="ETH">Éthiopie</option>
  <option value="FRO">Îles Féroé</option>
  <option value="FJI">Fidji</option>
  <option value="FIN">Finlande</option>
  <option value="FRA">France</option>
  <option value="GAB">Gabon</option>
  <option value="GMB">Gambie</option>
  <option value="GEO">Géorgie</option>
  <option value="DEU">Allemagne</option>
  <option value="GHA">Ghana</option>
  <option value="GIB">Gibraltar</option>
  <option value="GRC">Grèce</option>
  <option value="GRL">Groenland</option>
  <option value="GRD">Grenade</option>
  <option value="GLP">Guadeloupe</option>
  <option value="GUM">Guam</option>
  <option value="GTM">Guatemala</option>
  <option value="GGY">Guernesey</option>
  <option value="GIN">Guinée</option>
  <option value="GUY">Guyane</option>
  <option value="HTI">Haïti</option>
  <option value="HND">Honduras</option>
  <option value="HKG">Hong Kong</option>
  <option value="HUN">Hongrie</option>
  <option value="ISL">Islande</option>
  <option value="IND">Inde</option>
  <option value="IDN">Indonésie</option>
  <option value="IRN">Iran</option>
  <option value="IRQ">Irak</option>
  <option value="IRL">Irlande</option>
  <option value="IMN">Île de Man</option>
  <option value="ISR">Israël</option>
  <option value="ITA">Italie</option>
  <option value="JAM">Jamaïque</option>
  <option value="JPN">Japon</option>
  <option value="JEY">Jersey</option>
  <option value="JOR">Jordanie</option>
  <option value="KAZ">Kazakhstan</option>
  <option value="KEN">Kenya</option>
  <option value="KIR">Kiribati</option>
  <option value="PRK">Corée</option>
  <option value="KWT">Koweït</option>
  <option value="LVA">Lettonie</option>
  <option value="LBN">Liban</option>
  <option value="LSO">Lesotho</option>
  <option value="LBR">Liberia</option>
  <option value="LBY">Libye</option>
  <option value="LTU">Lituanie</option>
  <option value="LUX">Luxembourg</option>
  <option value="MAC">Macao</option>
  <option value="MDG">Madagascar</option>
  <option value="MWI">Malawi</option>
  <option value="MYS">Malaisie</option>
  <option value="MDV">Maldives</option>
  <option value="MLI">Mali</option>
  <option value="MLT">Malte</option>
  <option value="MRT">Mauritanie</option>
  <option value="MUS">Maurice</option>
  <option value="MYT">Mayotte</option>
  <option value="MEX">Mexique</option>
  <option value="MCO">Monaco</option>
  <option value="MNG">Mongolie</option>
  <option value="MNE">Monténégro</option>
  <option value="MSR">Montserrat</option>
  <option value="MOZ">Mozambique</option>
  <option value="MMR">Myanmar</option>
  <option value="NAM">Namibie</option>
  <option value="NRU">Nauru</option>
  <option value="NPL">Népal</option>
  <option value="NLD">Pays-Bas</option>
  <option value="NIC">Nicaragua</option>
  <option value="NER">Niger</option>
  <option value="NGA">Nigéria</option>
  <option value="NIU">Niue</option>
  <option value="NOR">Norvège</option>
  <option value="OMN">Oman</option>
  <option value="PAK">Pakistan</option>
  <option value="PLW">Palau</option>
  <option value="PRY">Paraguay</option>
  <option value="PER">Pérou</option>
  <option value="PHL">Philippines</option>
  <option value="PCN">Pitcairn</option>
  <option value="POL">Pologne</option>
  <option value="PRT">Portugal</option>
  <option value="PRI">Porto Rico</option>
  <option value="QAT">Qatar</option>
  <option value="REU">Réunion</option>
  <option value="ROU">Roumanie</option>
  <option value="RUS">Russie</option>
  <option value="RWA">Rwanda</option>
  <option value="WSM">Samoa</option>
  <option value="SAU">KSA</option>
  <option value="SEN">Sénégal</option>
  <option value="SRB">Serbie</option>
  <option value="SYC">Seychelles</option>
  <option value="SLE">Sierra Leone</option>
  <option value="SGP">Singapour</option>
  <option value="SVK">Slovaquie</option>
  <option value="SVN">Slovénie</option>
  <option value="SOM">Somalie</option>
  <option value="ESP">Espagne</option>
  <option value="LKA">Sri Lanka</option>
  <option value="SDN">Soudan</option>
  <option value="SUR">Suriname</option>
  <option value="SWZ">Swaziland</option>
  <option value="SWE">Suède</option>
  <option value="CHE">Suisse</option>
  <option value="THA">Thaïlande</option>
  <option value="TGO">Togo</option>
  <option value="TKL">Tokelau</option>
  <option value="TON">Tonga</option>
  <option value="TUN">Tunisie</option>
  <option value="TUR">Turquie</option>
  <option value="TUV">Tuvalu</option>
  <option value="UGA">Ouganda</option>
  <option value="UKR">Ukraine</option>
  <option value="ARE">UAE</option>
  <option value="GBR">Royaume-Uni</option>
  <option value="USA">États-Unis</option>
  <option value="URY">Uruguay</option>
  <option value="UZB">Ouzbékistan</option>
  <option value="VUT">Vanuatu</option>
  <option value="VNM">Viet Nam</option>
  <option value="YEM">Yémen</option>
  <option value="ZMB">Zambie</option>
  <option value="ZWE">Zimbabwe</option>
  </select>
           </div>
          
          <div class="form-group" style="position: relative; top: 208px ">
     
     <label class="label_field" style="position: relative; top: 28px">Ville</label>
     
    <input class="form-control" required="required" name="ville" placeholder=" Votre ville" style="position: relative; top: 50px; left: -40px" />
  </div>
     <div class="form-group" style="position: relative; top: 247px ">
     <label class="label_field" style="position: relative; top: 25px">Numéro de Téléphone</label>
   <input class="form-control" id="phone" required="required" name="phone" placeholder="Exemple : 0612345678" type="tel" style="position: relative; top: 33px; left: 0px"> 
  </div>
       
        <div class="m-t-lg">
          <ul class="list-inline">
            <li style="position: relative; bottom: -314px; left: 56px">
              <input class="btn btn--form" type="submit" value="Inscrire" />
            </li>
            <li style="position: relative; bottom: -328px; left: 50px">
              <a class="signup__link" href="login.php">Vous avez déjà un compte?</a>
            </li>
          </ul>
        </div>
      </form>  
    </div>
  </div>
</body>