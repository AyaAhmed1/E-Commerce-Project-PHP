  <table border="1px" bordercolor="black" width="50%" >

         <?php foreach ($cat_obj as $cat): ?>

                <tr>
                    
                    <td>  <a href="home.php"<?= $cat->getId() ?>  <?= $cat_obj->getName() ?>  > </a></td>

                </tr>
            <?php endforeach; ?>
  </table>
   <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

