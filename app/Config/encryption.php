<?php

/**
 * Configuration du chiffrement.
 *
 * Ce sont les paramètres utilisés pour le chiffrement, si vous ne transmettez pas de tableau de paramètres au chiffreur pour la création/initialisation.
 */

return [
    /**
     * -------------------------------------------------- --------------------
     * Démarreur de clé de cryptage
     * ------------------------------------------------- -------------------------
     *
     * Si vous utilisez la classe Encryption, vous devez définir une clé de cryptage (seed).
     * Vous devez vous assurer qu'il est suffisamment long pour le chiffrement et le mode que vous envisagez d'utiliser.
     * Consultez le guide de l'utilisateur pour plus d'informations.
     * 
     * @var string
     */
    'key' => '',

    /**
     * --------------------------------------------------------------------------
     * Pilote de chiffrement à utiliser
     * ------------------------------------------------- -------------------------
     *
     * L'un des pilotes de chiffrement pris en charge.
     *
     * Pilotes disponibles :
     * - OpenSSL
     * - Sodium
     * 
     * @var string
     */
    'driver' => 'OpenSSL',

    /**
     * --------------------------------------------------------------------------
     * Longueur de remplissage de SodiumHandler en octets
     * ------------------------------------------------- -------------------------
     *
     * Il s'agit du nombre d'octets qui seront complétés par le message en texte brut avant qu'il ne soit chiffré.
     * Cette valeur doit être supérieure à zéro.
     * Consultez le guide de l'utilisateur pour plus d'informations sur le rembourrage.
     * 
     * @var int
     */
    'block_size' => 16,

    /**
     * --------------------------------------------------------------------------
     * Diggest du chiffrement
     * ------------------------------------------------- -------------------------
     *
     * HMAC diggest à utiliser, par ex. « SHA512 » ou « SHA256 ». La valeur par défaut est « SHA512 ».
     * 
     * @var string
     */
    'digest' => 'SHA512',

    /**
     * Indique si le texte chiffré doit être brut. S'il est défini sur false, il sera codé en base64.
     * Ce paramètre est uniquement utilisé par OpenSSLHandler.
     * 
     * @var bool
     */
    'rawData' => true,

    /**
     * Informations sur la clé de cryptage.
     * Ce paramètre est uniquement utilisé par OpenSSLHandler.
     * 
     * @var string
     */
    'encryptKeyInfo' => '',

    /**
     * Informations sur la clé d'authentification.
     * Ce paramètre est uniquement utilisé par OpenSSLHandler.
     * 
     * @var string
     */
    'authKeyInfo' => '',

    /**
     * Chiffre à utiliser.
     * Ce paramètre est uniquement utilisé par OpenSSLHandler.
     * 
     * @var string
     */
    'cipher' => 'AES-256-CTR',
];
