<?php
session_start();
//Configurazione Database
$Database=mysqli_connect("saisraffcu00.mysql.db","saisraffcu00","Lelesais21","saisraffcu00");
if(!$Database)
{
    echo "Impossibile Collegarsi Al Db";
    die();
}

//Funzione Che Visualizza Le Categorie
function get_Categorie()
{
    global $Database;
    $Query="SELECT * FROM categorie";
    $Ris=mysqli_query($Database,$Query);
    while($row=mysqli_fetch_array($Ris))
    {
        $Tmp=$row['nome_cat'];
        echo "<a href=\"categorie.php?id={$row['id_cat']}\" class=\"list-group-item\">$Tmp</a>";
    }
}

//Funzione Che Visualizza I Prodotti
function get_Prodotti()
{
    global $Database;
    $Query="SELECT * FROM prodotti LIMIT 10";
    $Ris=mysqli_query($Database,$Query);
    while($row=mysqli_fetch_array($Ris))
    {
        echo "<div class=\"col-lg-4 col-md-6 mb-4\">
                    <div class=\"card h-100\">
                        <a href=\"prodotto.php?id={$row['id_prodotto']}\"><img class=\"card-img-top\" src={$row['immagine']} alt=''></a>
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">
                                <a href='prodotto.php?id={$row['id_prodotto']}'>{$row['nome_prodotto']}</a>
                            </h4>
                            <h5>€{$row['prezzo']}</h5>
                            <p class=\"card-text\">{$row['descr_prodotto']}</p>
                        </div>
                        <div class=\"card-footer\">
                            <a href='prodotto.php?id={$row['id_prodotto']}'>Dettagli</a>
                        </div>
                    </div>
                </div>";
    }
}

//Funzione Che Visualizza Prodotti Categoria
function get_ProdottiCat($id)
{
    global $Database;
    $Query="SELECT * FROM prodotti WHERE cat_prodotto='{$id}'";
    $Ris=mysqli_query($Database,$Query);
    if(mysqli_num_rows($Ris)>0)
    {
        $row=mysqli_fetch_array($Ris);
        $Prod=<<<String
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card altezza">
            <img class="card-img-top" src="{$row['immagine']}" alt="">
            <div class="card-body">
              <h4 class="card-title">{$row['nome_prodotto']}</h4>
              <p class="card-text">{$row['descr_prodotto']}</p>
            </div>
            <div class="card-footer">
              <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-primary">Dettagli!</a>
            </div>
          </div>
        </div>
String;
        echo $Prod;
    }
}

//Funzione Che Gestisce Pagina Singola Prodtto
function get_Prodotto($id)
{
    global $Database;
    $Query="SELECT * FROM prodotti WHERE id_prodotto='{$id}'";
    $Ris=mysqli_query($Database,$Query);
        $row=mysqli_fetch_array($Ris);
        $Prod=<<<String
         <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{$row['immagine']}" alt="">
            <div class="card-body">
              <h3 class="card-title">Descrizione</h3>
              <h4>€{$row['prezzo']}</h4>
              <p class="card-text">{$row['info_dettagliate']}</p>
              <a href="prodotto.php?add={$row['id_prodotto']}"><button type="button" class="btn bg-primary btn-small btn-block">Acquista</button></a>
            </div>
          </div>
String;
        echo $Prod;
}

//Funzione Che Crea Un Messaggio
function CreaAvviso($Mess)
{
    $_SESSION['Messaggio']=$Mess;
}

//Funzione Che Controlla Avviso
function CheckAvviso()
{
    if(isset($_SESSION['Messaggio']))
    {
        $Tmp=$_SESSION['Messaggio'];
        echo "<script>alert('$Tmp')</script>";
        $_SESSION['Messaggio']=null;
    }
}

//Funzione Che Visualizza Prodotti Carrello
function get_Carrello()
{
    $_SESSION['Tot_Articoli']=0;
    global $Database;
    foreach ($_SESSION as $nome=>$val)
    {
        if($val>0)
        {
            if(substr($nome,0,9)=="prodotto_")
            {
                $lung=strlen($nome-9);
                $id=substr($nome,9,$lung);
                $Query="SELECT * FROM prodotti WHERE id_prodotto='{$id}'";
                $Ris=mysqli_query($Database,$Query);
                if($Ris)
                {
                    $row=mysqli_fetch_array($Ris);
                    $Qnt=$_SESSION['prodotto_'.$id];
                    $Totale=$Qnt*$row['prezzo'];
                    $_SESSION['Tot_Articoli']=$_SESSION['Tot_Articoli']+$Totale;
                    $Prod=<<<String
                    <tr>
                                  <td>{$row['nome_prodotto']}</td>
                                  <td>€{$row['prezzo']}</td>
                                  <td>{$Qnt}</td>
                                  <td>{$Totale}</td>
                                  <td><a class="btn btn-success" href="prodotto.php?add=$id" role="button">Aggiungi</a></td>
                                  <td><a class="btn btn-warning" href="carrello.php?remove=$id" role="button">Rimuovi</a></td>
                                  <td><a class="btn btn-danger" href="carrello.php?delete=$id" role="button">Cancella</a> </td>
                              </tr> 
String;
echo $Prod;
                }
            }
        }
    }
}
//Funzione Che Visualizza Prodotti Pag Admin
function get_ProdottiAdmin()
{
    global $Database;
    $Query="SELECT * FROM prodotti";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        while($row=mysqli_fetch_array($Ris))
        {
            $Prod=<<<Prodotto
                    <tr>
                        <th>{$row['id_prodotto']}</th>
                        <th>{$row['nome_prodotto']}</th>
                        <th>{$row['prezzo']}</th>
                        <th>{$row['quantita_pdt']}</th>
                        <th><a class="btn btn-danger" href="Vedi_Prodotti.php?remove={$row['id_prodotto']}" role="button" onClick="return confirm('Sicuro di voler eliminare il prodotto?')">Cancella</a>
                        <a class="btn btn-warning" href="Update_Prodotti.php?update={$row['id_prodotto']}" role="button">Modifica</a> </th>
                    </tr>
Prodotto;
echo $Prod;
        }
    }
}
//Funzione Che Elimina Prodotto
function Elimina_Prod($id)
{
    global $Database;
    $Query="DELETE FROM prodotti WHERE id_prodotto='$id'";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        header("Location: Vedi_Prodotti.php");
    }
}
//Funzione Che Inserisce Un Prodotto
function Add_Prod($Nome,$Desc,$Info,$Prezzo,$Categoria,$Qnt,$Foto)
{
    global $Database;
    $Nome=mysqli_real_escape_string($Database,$Nome);
    $Desc=mysqli_real_escape_string($Database,$Desc);
    $Info=mysqli_real_escape_string($Database,$Info);
    $Prezzo=mysqli_real_escape_string($Database,$Prezzo);
    $Foto=mysqli_real_escape_string($Database,$Foto);
    $Query="INSERT INTO prodotti(nome_prodotto,descr_prodotto,prezzo,cat_prodotto,immagine,info_dettagliate,quantita_pdt) VALUES('{$Nome}','{$Desc}','{$Prezzo}','{$Categoria}','{$Foto}','{$Info}','{$Qnt}')";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        echo "<script>
            alert('Prodotto Inserito!');
            window.location='Vedi_Prodotti.php';
          </script>";
    }
    else
    {
        echo "<script>alert('Prodotto Non Inserito!Errore')</script>";
    }
}

//Funzione Ceh Stampa Categorie
function get_CategorieSelect($seleziona)
{
    global $Database;
    $Query="SELECT * FROM categorie";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        while($row=mysqli_fetch_array($Ris))
        {
            $Nome=$row['nome_cat'];
            $id=$row['id_cat'];
            if($seleziona==$id)
            {
                echo "<option value='$id' selected>$Nome</option>";
            }
            else
            {
                echo "<option value='$id'>$Nome</option>";
            }
        }
    }
}

//Funzione Che Aggiorna Prodotto
function Update_Prod($id,$NomePdt,$Desc,$Info,$Prezzo,$Categoria,$Qnt,$Img)
{
    global $Database;
    $NomePdt=mysqli_real_escape_string($Database,$NomePdt);
    $Desc=mysqli_real_escape_string($Database,$Desc);
    $Info=mysqli_real_escape_string($Database,$Info);
    $Prezzo=mysqli_real_escape_string($Database,$Prezzo);
    $Foto=mysqli_real_escape_string($Database,$Img);
    $Query="UPDATE prodotti SET nome_prodotto='{$NomePdt}',descr_prodotto='{$Desc}',prezzo='{$Prezzo}',cat_prodotto='{$Categoria}',immagine='{$Foto}',info_dettagliate='{$Info}',quantita_pdt='{$Qnt}' WHERE id_prodotto='{$id}'";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        echo "<script>
            alert('Prodotto Aggiornato!');
            window.location='Vedi_Prodotti.php';
          </script>";
    }
    else
    {
        $Errore=mysqli_error($Database);
        echo "<script>
                alert(''.$Errore);
              </script>";
    }
}

//Funzione Che Restituisce Categoria
function get_Cat($id)
{
    global $Database;
    $Query="SELECT * FROM prodotti where id_prodotto='{$id}'";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        $row=mysqli_fetch_array($Ris);
        return $row['cat_prodotto'];
    }
    return 0;
}

//Controlla Se Il Sito E' In Manutenzione
function isDown()
{
    $Ris=Query("SELECT * FROM utility");
    if($Ris)
    {
        $row=mysqli_fetch_array($Ris);
        $Manu=$row['manutenzione'];
        if($Manu)
        {
            $Scrivi=<<<String
            <script>
                alert('Sito In Manutenzione');
                window.location="https://www.saisraffaele.it";
            </script>
String;
echo $Scrivi;
        }
    }
}

//Funzione Che Gestisce Query
function Query($Tmp)
{
    global $Database;
    $Ris=mysqli_query($Database,$Tmp);
    return $Ris;
}

//Check Manutenzione
function checkManu()
{
    $Ris=Query("SELECT * FROM utility");
    if($Ris)
    {
        $row=mysqli_fetch_array($Ris);
        $Manu=$row['manutenzione'];
        if($Manu)
        {
            echo "In Manutenzione";
        }
        else
        {
            echo "Non In Manutenzione";
        }
    }
}
//Funzione Che Setta La Manutenzione
function SetManu($Val)
{
    $id=1;
    global $Database;
    $Query="UPDATE utility SET manutenzione='{$Val}' WHERE id_utility='{$id}'";
    $Ris=mysqli_query($Database,$Query);
    if($Ris)
    {
        $Tmp=<<<String
        <script>
            if("$Val"==0)
                {
                    alert('Manutenzione Disattivata!');
                }
                else
                    {
                        alert('Manutenzione Attivata!');
                    }
        </script>
String;
echo $Tmp;
    }
}

//Funzione Che Controlla Se è Loggato Admin
function is_Admin()
{
    if(!$_SESSION['Admin']=="Si")
    {
        header("Location: Login.php");
    }
}

//Funzione Che Logga Admin
function Login($User,$Psw)
{
    $Ris=Query("SELECT * FROM utenti WHERE username='{$User}' and password='{$Psw}'");
    $N=mysqli_num_rows($Ris);
    if($N>0)
    {
        $_SESSION['Admin']="Si";
        $Tmp=<<<String
        <script>
            window.location="index.php";
        </script>
String;
        echo $Tmp;
    }
    else
    {
        $Tmp=<<<String
        <script>
            alert('Dati Errati!!');
        </script>
String;
        echo $Tmp;
    }
}

//Funzione Che Effettua Logout
function Logout()
{
    $_SESSION['Admin']=null;
    header("Location: Login.php");
}

//Funzione Che Restiutisce Categorie In Tabella
function get_CategorieAdmin()
{
    $Ris=Query("SELECT * FROM categorie");
    if($Ris)
    {
        while($row=mysqli_fetch_array($Ris))
        {
            $Tmp=<<<String
            <tr>
                <th>{$row['id_cat']}</th>
                <th>{$row['nome_cat']}</th>
                <th><a class="btn btn-danger" href="Categorie.php?remove={$row['id_cat']}" onclick="return confirm('Sicuro di volere eliminare la categoria?')">Elimina</a></th>
            </tr>
String;
echo $Tmp;
        }
    }
}

//Funzione Che Crea Categorie
function Crea_Cat($Nome)
{
    $Ris=Query("INSERT INTO categorie (nome_cat) VALUES('{$Nome}')");
    if($Ris)
    {
        $Tmp=<<<String
        <script>alert("Categoria Creata!")
            window.location="Categorie.php";
        </script>;
        
String;
echo $Tmp;
    }
}

//Funzione Che Elimina Categoria
function Elimina_Cat($id)
{
    $Ris=Query("DELETE FROM categorie WHERE id_cat='{$id}'");
    if($Ris)
    {
        header("Location: Categorie.php");
    }
}