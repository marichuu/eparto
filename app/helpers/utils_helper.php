<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('crypter')) {

    /**
     * La fonction permet de crypter une chaine .
     * @author Patrick Kokou <patrick.kokou@e-sud.net>
     * @param String $plain
     * @return String
     */
    function crypter($plain) {
        $CI = get_instance();
        $CI->load->library('encrypt');
        return $CI->encrypt->encode($plain);
    }

}

if (!function_exists('decrypter')) {

    /**
     * La fonction permet de décrypter une chaine .
     * @author Patrick Kokou <patrick.kokou@e-sud.net>
     * @param String $crypted
     * @return String
     */
    function decrypter($crypted) {
        $CI = get_instance();
        $CI->load->library('encrypt');
        return $CI->encrypt->decode($crypted);
    }

}

if (!function_exists('getMessages')) {

    /**
     * La fonction permet d'afficher les messages de notification.
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return String
     */
    function getMessages() {
        $str = '';
        $CI = & get_instance();
        $globalMessages = (array) $CI->session->userdata('globalMessages');
        /* remove empty items */
        $globalMessages = array_filter($globalMessages);
        if (count($globalMessages) > 0) {
            foreach ($globalMessages as $k => $v) {
                $str .= '<div class="alert alert-' . $k . '" style="text-align:center; font-size:1.1em;"><a class="close" data-dismiss="alert">×</a>';
                foreach ((array) $v as $w) {
                    $str .= "$w\n";
                }
                $str .= '</div>';
            }
        }
        $CI->session->unset_userdata('globalMessages');
        return $str;
    }

}

if (!function_exists('setMessages')) {

    /**
     * La fonction permet de définir les messages de notification à afficher après un traitement.
     * @author Patrick Kokou <patrick.kokou@e-sud.net>  
     * @param String $msg
     * @param String $type
     * @param Boolean   $is_multiple
     * @return String
     */
    function setMessages($msg = '', $type = 'error', $is_multiple = true) {
        $CI = & get_instance();
        $globalMessages = (array) $CI->session->userdata('globalMessages');
        foreach ((array) $msg as $v) {
            if ($is_multiple) {
                $globalMessages[$type][] = (string) $v;
            } else {
                $globalMessages[$type][0] = (string) $v;
            }
        }
        if (isset($globalMessages[0])) {
            unset($globalMessages[0]);
        }
        $CI->session->set_userdata('globalMessages', $globalMessages);
    }

}

if (!function_exists('forme_rules')) {

    /**
     * La fonction permet de définir les règles de validation.
     * @author Patrick Kokou <patrick.kokou@e-sud.net>  
     * @param String $field
     * @param String $label
     * @param String   $rules
     * @return Array
     */
    function forme_rules($field = '', $label = '', $rules = '') {
        return array('field' => $field, 'label' => $label, 'rules' => $rules);
    }

}

if (!function_exists('formatNumber')) {

    /**
     * La fonction permet de mettre un nombre au format nombre.
     * @author Patrick Kokou <patrick.kokou@e-sud.net>  
     * @param String $num 
     * @return String 
     */
    function formatNumber($num) {
        return substr_replace('0000', $num, -strlen($num));
    }

}

if (!function_exists('formatM')) {

    /**
     * La fonction permet de mettre un nombre au format monétaire.
     * @author Patrick Kokou <patrick.kokou@e-sud.net>  
     * @param String $nombre 
     * @return String 
     */
    function formatM($nombre) {
        return number_format((int) $nombre, 0, '', ' ');
    }

}

/** info in session */
if (!function_exists('setSession')) {

    /**
     * @param $data
     */
    function setSession($data) {
        $CI = & get_instance();
        $globalMessages = $CI->session->userdata('globalMessages');
        if (isset($globalMessages)) {
            unset($globalMessages);
        }
        $CI->session->set_userdata('datasession', $data);
    }

}

if (!function_exists('getSession')) {

    function getSession() {
        $CI = & get_instance();
        $datasession = (int) $CI->session->userdata('datasession');
        $CI->session->unset_userdata('datasession');
        return $datasession;
    }

}

if (!function_exists('getStructuresTree')) {

    /**
     * La fonction permet de representer les structures sous forme d'arbre.
     * @author Patrick Kokou <patrick.kokou@e-sud.net>
     * @param Integer $id (Id de la structure mère)
     * @return String
     */
    function getStructuresTree($id = null) {
        $CI = &get_instance();
        $em = $CI->doctrine->em;
        $structures = $em->getRepository("Entity\\Structure")->getAllChilchen($id);
        $str = '';
        if (count($structures) > 0) {
            foreach ($structures as $s) {
                $str .= "<ul class=\"jstree-container-ul\">
                            <li id=\"j1_1\" class=\"jstree-node jstree-open\" role=\"treeitem\" aria-expanded=\"true\" aria-selected=\"false\">
                                <i class=\"jstree-icon jstree-ocl\"></i>
                                <a class=\"jstree-anchor \"  href=\"" . site_url("system/structure/edit/?xl=" . $s->getId()) . "\" title=\"\">
                                    <i class=\"jstree-icon jstree-themeicon\"></i>";
                $str .= $s;
                $str .= "</a>";
                $str .= getStructuresTree($s->getId());
                $str .= "</li> </ul>";
            }
        }

        return $str;
    }

    if (!function_exists('trim_in')) {

        /**
         * La fonction trim pour twig
         * @author Patrick Kokou <patrick.kokou@e-sud.net>
         * @param String $str
         * @return String
         */
        function trim_in($str) {
            return str_replace(' ', '', $str);
        }

    }

    if (!function_exists('safename')) {

        function safename($theValue) {
            $_trSpec = array(
                'Ç' => 'C',
                'Ğ' => 'G',
                'İ' => 'I',
                'Ö' => 'O',
                'Ş' => 'S',
                'Ü' => 'U',
                'ç' => 'c',
                'ğ' => 'g',
                'ı' => 'i',
                'i' => 'i',
                'ö' => 'o',
                'ş' => 's',
                'ü' => 'u',
                'é' => 'e',
                'è' => 'e',
                'ê' => 'e',
                'à' => 'a',
                'â' => 'a',
                'î' => 'i',
                'ï' => 'i'
            );
            $enChars = array_values($_trSpec);
            $trChars = array_keys($_trSpec);
            $theValue = str_replace($trChars, $enChars, $theValue);
            $theValue = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "-", $theValue);
            $theValue = strtolower($theValue);
            return $theValue;
        }

    }
}

if (!function_exists('tracking')) {

    /**
     * La fonction trace l'application, elle recupère quel utilisateur a fait quelle action
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @param Entity\Menu $menu
     * @param String $action
     * @param String $desc_action
     * @param String   $element
     * @param String   $entity
     * @return void
     */
    function tracking($menu, $action, $desc_action, $element, $entity) {
        $doctrine = new Doctrine();
        $CI = get_instance();
        $user_connected = $CI->session->userdata('user');
        $user = $doctrine->em->find('Entity\\User', (int) $user_connected->id);
        $dateheure = date("d-m-Y H:i:s");
        $file = 'assets/logs/operation.txt';
        $fileopen = (fopen($file, "a"));
        fwrite($fileopen, $dateheure . ';' . $user . ';' . $menu . ';' . $action . ';' . $desc_action . ';' . $element . ';' . $entity . ';' . "\r\n");
        fclose($fileopen);
    }

}

if (!function_exists('statistic')) {

    /**
     * La fonction defini la statisque de connexion des utilisateurs
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @param String $type
     * @return void
     */
    function statistic($type) {
        $doctrine = new Doctrine();
        $CI = get_instance();
        $user_connected = $CI->session->userdata('user');
        $user = $doctrine->em->find('Entity\\User', (int) $user_connected->id);
        $dateheure = date("d-m-Y H:i:s");
        $file = 'assets/logs/connexion.txt';
        $fileopen = (fopen($file, "a"));
        fwrite($fileopen, $dateheure . ';' . $user . ';' . $type . "\r\n");
        fclose($fileopen);
    }

}

if (!function_exists('hasRights')) {

    /**
     * La fonction vérifie si un utilisateur a les privilèges pour accéder à un menu
     * @author Patrick Kokou <patrick.kokou@e-sud.net>
     * @param String $code_menu
     * @return Boolean
     */
    function hasRights($menu) {
        $tab_menu = getRights();
        if (count($tab_menu) == 0)
            return false;
        $menus = array();
        foreach ($tab_menu as $value) {
            $tab = explode('-', $value);
            $menus[] = $tab[0];
        }
        if (in_array($menu, $menus))
            return true;
        return false;
    }

}

if (!function_exists('loadUserRights')) {

    /**
     * La fonction charge tous les droits de l'utilisateur
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return void
     */
    function loadUserRights() {
        $CI = &get_instance();
        $em = $CI->doctrine->em;
        $rights = array();
        $user = $em->find('Entity\\User', (int) $CI->session->userdata('user')->id);
        $profils = $user->getProfils();
        if (count($profils) > 0) {
            foreach ($profils as $profil) {
                $menus = $em->getRepository('Entity\\ProfilMenu')->findBy(array('profil' => $profil));
                if (count($menus) <= 0)
                    continue;
                foreach ($menus as $m) {
                    if ($m->getRights() != null) {
                        //concatener le code du menu et le code des drotis sur les actions
                        $rights[] = $m->getMenu()->getCodeName() . '-' . $m->getRights();
                    }
                }
            }
        }
        $CI->session->set_userdata('userRights', implode('_', $rights));
    }

}

if (!function_exists('loadTemplateRights')) {

    /**
     * La fonction charge tous les droits de l'utilisateurs sur ces templates 
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return void
     */
    function loadTemplateRights() {
        $CI = &get_instance();
        $em = $CI->doctrine->em;
        $rights = array();
        $user = findUser();
        $objects = $em->getRepository('Entity\\TemplateRights')->findBy(array('user' => $user));
        if (count($objects) == 0)
            return $rights;
        foreach ($objects as $o) {
            //concatener template, operation type et admin entity
            $rights[] = $o->getTemplate()->getid() . '-' . $o->getTypeOperation()->getid() . '-' . $o->getAdminEntity()->getid();
        }

        $CI->session->set_userdata('userTemplateRights', implode('_', $rights));
    }

}

if (!function_exists('findUser')) {

    /**
     * La fonction retourne l'objet de l'utilisateur connecté au lieu de l'id
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Object User 
     */
    function findUser() {
        $CI = &get_instance();
        $em = $CI->doctrine->em;
        $user_connected = $CI->session->userdata('user');
        $user = $em->find('Entity\\User', (int) $user_connected->id);
        return $user;
    }

}


if (!function_exists('hasDataEntryRights')) {

    /**
     * La fonction vérifie si l'utilisateur a les privilèges pour la saisie des données (data entry)
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Boolean 
     */
    function hasDataEntryRights($template, $admin_entity) {
        $temp_rights = getTemplateRights();
        if (count($temp_rights) == 0)
            return false;
        foreach ($temp_rights as $value) {
            $chaine = $template . '-1-' . $admin_entity;
            if ($chaine == $value)
                return true;
        }
        return false;
    }

}

if (!function_exists('hasSignOffRights')) {

    /**
     * La fonction vérifie si l'utilisateur a les privilèges (sign off)
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Boolean 
     */
    function hasSignOffRights($template, $admin_entity) {
        $temp_rights = getTemplateRights();
        if (count($temp_rights) == 0)
            return false;
        foreach ($temp_rights as $value) {
            $chaine = $template . '-2-' . $admin_entity;
            if ($chaine == $value)
                return true;
        }
        return false;
    }

}

if (!function_exists('hasValidationRights')) {

    /**
     * La fonction vérifie si l'utilisateur a les privilèges (validation)
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Boolean 
     */
    function hasValidationRights($template, $admin_entity) {
        $temp_rights = getTemplateRights();
        if (count($temp_rights) == 0)
            return false;
        foreach ($temp_rights as $value) {
            $chaine = $template . '-3-' . $admin_entity;
            if ($chaine == $value)
                return true;
        }
        return false;
    }

}

if (!function_exists('getRights')) {

    /**
     * La fonction retourne les doris de l'utilisateur connecté
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Array  exemple: 401-4321 (code menu + droit sur les actions)
     */
    function getRights() {
        $CI = &get_instance();
        $rights = $CI->session->userdata('userRights');
        $tab_menu = explode('_', $rights);
        return $tab_menu;
    }

}

if (!function_exists('getTemplateRights')) {

    /**
     * La fonction retourne les drotis de l'utilisateur connecté sur les templates
     * @author Patrick Kokou <patrick.kokou@e-sud.net> 
     * @return Array  exemple: 4-1-2 (code template + type operation + admin entity)
     */
    function getTemplateRights() {
        $CI = &get_instance();
        $rights = $CI->session->userdata('userTemplateRights');
        $tab_rights = explode('_', $rights);
        return $tab_rights;
    }

}

if (!function_exists('hasRightsOnAction')) {

    /**
     * La fonction vérifie si un utilisateur a les privilèges pour accéder à un bouton d'action (modifier, supprimer, consulter)
     * @author Patrick Kokou <patrick.kokou@e-sud.net>
     * @param String $menu
     * @param Integer $action
     * @return Boolean
     */
    function hasRightsOnAction($menu, $action) {
        $tab_menu = getRights();
        if (count($tab_menu) == 0)
            return false;
        foreach ($tab_menu as $value) {
            $tab = explode('-', $value);
            if ($menu == $tab[0]) {
                $rights = str_split($tab[1]);
                if (in_array($action, $rights))
                    return true;
                return false;
            }
        }
        return false;
    }

}


if (!function_exists('manageRights')) {

    /**
     * La fonction verifie si un utilisateur a les droits necessaires pour etre proposé à l'attribution des droits de manage
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @param String $type
     * @return Boolean
     */
    function manageRights($user, $menu, $action) {
        $CI = &get_instance();
        $em = $CI->doctrine->em;
        $profils = $user->getProfils();
        if (count($profils) <= 0)
            return false;

        foreach ($profils as $profil) {
            $menus = $em->getRepository('Entity\\ProfilMenu')->findBy(array('profil' => $profil));
            if (count($menus) == 0)
                continue;
            $tab_menu = array();
            foreach ($menus as $m) {
                if ($m->getRights() != null) {
                    $rights = str_split($m->getRights());
                    if (in_array(trim($action), $rights))
                        $tab_menu[] = $m->getMenu()->getCodeName();
                }
            }
            if (in_array($menu, $tab_menu))
                return true;
        }
        return false;
    }

}
if (!function_exists('IsAllActivitySigned')) {

    /**
     * La fonction compte le nombre de fois que l'activité a été signé
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @return Integer 
     */
    function IsAllActivitySigned($activity_id) {
        $doctrine = new Doctrine();
        $activity = $doctrine->em->find('Entity\\Activity', $activity_id);
        $activitySign = $doctrine->em->getRepository('Entity\\ActivitySign')->findBy(array('activity' => $activity, 'signed' => 1));
        return count($activitySign);
    }

}
if (!function_exists('IsAllBudgetSigned')) {

    /**
     * La fonction compte le nombre de fois que l'activité a été signé
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @return Integer 
     */
    function IsAllBudgetSigned($budget_id) {
        $doctrine = new Doctrine();
        $budget = $doctrine->em->find('Entity\\ActivityBudget', $budget_id);
        $budgetSign = $doctrine->em->getRepository('Entity\\ActivityBudgetSign')->findBy(array('activityBudget' => $budget, 'signed' => 1));
        return count($budgetSign);
    }

}

if (!function_exists('IsAllBudgetOk')) {

    /**
     * La fonction compte le nombre de fois que l'activité a été signé
     * @author Mariam Sidibe <sidibemaril@gmail.com>
     * @return Integer 
     */
    function IsAllBudgetOk($budget_id) {
        $doctrine = new Doctrine();
        $budget = $doctrine->em->find('Entity\\Budget', $budget_id);
        $budgetSign = $doctrine->em->getRepository('Entity\\BudgetSign')->findBy(array('budget' => $budget, 'signed' => 1));
        return count($budgetSign);
    }

}

if (!function_exists('tauxAssiduiteFille')) {

    function tauxAssiduiteFille($annee, $trimestre) {
        $doctrine = new Doctrine();
        $taux_moyen_fille = 0;
        $rapportCaps = $doctrine->em->getRepository('Entity\\RapportCap')->findBy(array('anneeScolaire' => $annee, 'trimestre' => $trimestre), array('id' => 'asc'));
        if ($rapportCaps) {
            $taux = $doctrine->em->getRepository('Entity\\TauxAssiduite')->findBy(array('rapportCap' => $rapportCaps), array('id' => 'asc'));
            $taux_fille = 0;
            foreach ($taux as $t) {
                $taux_fille += $t->getAssiduiteFille();
            }
            if (count($taux) > 0)
                $taux_moyen_fille = $taux_fille / count($taux);
        }
        return($taux_moyen_fille);
    }

}

if (!function_exists('tauxAssiduiteGarcon')) {

    function tauxAssiduiteGarcon($annee, $trimestre) {
        $doctrine = new Doctrine();
        $taux_moyen_garcon = 0;
        $rapportCaps = $doctrine->em->getRepository('Entity\\RapportCap')->findBy(array('anneeScolaire' => $annee, 'trimestre' => $trimestre), array('id' => 'asc'));
        if ($rapportCaps) {
            $taux = $doctrine->em->getRepository('Entity\\TauxAssiduite')->findBy(array('rapportCap' => $rapportCaps), array('id' => 'asc'));
            $taux_garcon = 0;
            foreach ($taux as $t) {
                $taux_garcon += $t->getAssiduiteGarcon();
            }
            if (count($taux) > 0)
                $taux_moyen_garcon = $taux_garcon / count($taux);
        }
        return($taux_moyen_garcon);
    }

}

if (!function_exists('tmas')) {

    function tmas($annee, $trimestre) {
        $doctrine = new Doctrine();
        $tmas = 0;
        $rapportCaps = $doctrine->em->getRepository('Entity\\RapportCap')->findBy(array('anneeScolaire' => $annee, 'trimestre' => $trimestre), array('id' => 'asc'));
        if ($rapportCaps) {
            $taux = $doctrine->em->getRepository('Entity\\TauxMensuel')->findBy(array('rapportCap' => $rapportCaps), array('id' => 'asc'));
            $tmas = 0;
            foreach ($taux as $t) {
                $tmas += $t->getTmas();
            }
            if (count($taux) > 0)
                $tmas_moyen = $tmas / count($taux);
        }
        return($tmas);
    }

}
if (!function_exists('vivreFourni')) {

    function vivreFourni($annee, $produit) {
        $doctrine = new Doctrine();
        $vivreFourni = 0;
        $rapportSuivi = $doctrine->em->getRepository('Entity\\RapportSuivi')->findBy(array('anneeScolaire' => $annee), array('id' => 'asc'));
        if ($rapportSuivi) {
            $taux = $doctrine->em->getRepository('Entity\\VivreFourni')->findBy(array('rapportSuivi' => $rapportSuivi, 'produit' => $produit), array('id' => 'asc'));
            foreach ($taux as $t) {
                $vivreFourni += $t->getQte();
            }
        }
        return($vivreFourni);
    }

}
if (!function_exists('eleveNourri')) {

    function eleveNourri($annee) {
        $doctrine = new Doctrine();
        $eleveNourri = 0;
        $rapportSuivi = $doctrine->em->getRepository('Entity\\RapportSuivi')->findBy(array('anneeScolaire' => $annee), array('id' => 'asc'));
        foreach ($rapportSuivi as $rs) {
            $eleveNourri += $rs->getEleveNourri();
        }
        return($eleveNourri);
    }

}

if (!function_exists('eleveNonNourri')) {

    function eleveNonNourri($annee) {
        $doctrine = new Doctrine();
        $eleveNonNourri = 0;
        $rapportSuivi = $doctrine->em->getRepository('Entity\\RapportSuivi')->findBy(array('anneeScolaire' => $annee), array('id' => 'asc'));
        foreach ($rapportSuivi as $rs) {
            $eleveNonNourri += $rs->getEleveNonNourri();
        }
        return($eleveNonNourri);
    }

}

if (!function_exists('is_refer')) {

    function is_refer($femme_id) {
        $doctrine = new Doctrine();
        $femme = $doctrine->em->find('Entity\\Femme', $femme_id);
        $refer = $doctrine->em->getRepository('Entity\\Reference')->findOneBy(array('femme' => $femme->getId()));
        return($refer);
    }

}

if (!function_exists('date_interval')) {

    function date_interval($d) {
        $d2 = new DateTime();
        $d1 = new DateTime($d);
        $diff = $d1->diff($d2);

        $nb_minutes = $diff->i;
        $nb_heures = $diff->h;
        if($nb_heures > 0 )
            $nb = $nb_heures." h et ".$nb_minutes;
        else
            $nb = $nb_minutes;
        return($nb);
    }

}
