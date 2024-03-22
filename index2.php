<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2023-2025 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';

if(isset($_GET['continent'])){
  $continent = $_GET['continent'];
  
} else {
  $continent = 'Asia';

}


$desPays = getCountriesByContinent($continent);

?>

<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1>Les pays en <?php echo $continent; ?> </h1>
    <h5>Nombre de pays : <?php echo getNbPays();?></h5>
    <h5>Nombre de villes : <?php echo getNbVilles();?></h5>
    <div>
     <table class="table">
         <tr>
           <th>Drapeau</th>
           <th>Nom</th>
           <th>Population</th>
           <th>Continent</th>
           <th>Capital</th>
           <th>Chef d'état</th>
           <th>Code</th>
           <th>Surface</th>
           <th>Gouvernement</th>



         </tr>
       <?php foreach ($desPays as $lepays){ ?>
            <tr>
              <?php $code = mb_strtolower($lepays->Code2);?>
              <td> <img src="<?php if (file_exists("images/drapeau/".$code.".png")){ echo "images/drapeau/$code.png";} else {echo "images/drapeau/drapblanc.png";}?>"
                  alt="<?php echo strtolower($lepays -> Name)?>"
                  style="max-height: 25px;"/></td>
    
              <td> <a href="infos_city.php"><?php echo $lepays->Name?></td></a>
              <td> <?php echo $lepays->Population; ?></td>
              <td> <?php echo $lepays->Continent; ?></td>
              <td> <?php if(!empty($lepays->Capital)){ echo getCapital($lepays->Capital); } else{echo "Aucune";}?></td>
              <td> <?php echo $lepays->HeadOfState; ?></td>
              <td> <?php echo $lepays->Code; ?></td>
              <td> <?php echo $lepays->SurfaceArea; ?></td>
              <td> <?php echo $lepays->GovernmentForm; ?></td>
              



            </tr>
      <?php } ?>
     </table>
    </div>
    
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>