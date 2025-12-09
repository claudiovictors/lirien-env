<?php

/**
 * --------------------------------------------------------------------------
 * Classe Env
 * --------------------------------------------------------------------------
 *
 * Esta classe é responsável por carregar as variáveis de ambiente a partir
 * de um arquivo .env. Ela lê o arquivo linha por linha, ignora comentários
 * e linhas vazias, e define as variáveis no ambiente do sistema ($_ENV,
 * $_SERVER e através da função putenv()).
 * 
 * @author lirien
 * @version 1.0.0
 */

declare(strict_types=1);

namespace Lirien\Support;
class Env {

    /**
     * Caminho para o arquivo .env.
     *
     * @var string
     */
    private static string $path_env = '';

    /**
     * Carrega as variáveis de ambiente do arquivo especificado.
     *
     * @param string $path
     * @throws \Exception Se o arquivo .env não for encontrado.
     * @return void
     */
    public static function load(string $path) {
        self::$path_env = $path;

        if(!file_exists(self::$path_env)) return;

        $lines_path = file(self::$path_env, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach($lines_path as $line){
            $line = trim($line);

            if(strpos($line, '#') === 0){
                continue;
            }

            if (strpos($line, '=') !== false) {
                
                list($variable, $value) = explode('=', $line, 2);
                
                if (!array_key_exists($variable, $_ENV) && !array_key_exists($variable, $_SERVER)) {
                    putenv("$variable=$value");
                    $_ENV[$variable] = $value;
                    $_SERVER[$variable] = $value;
                }
            }
        }

    }

    /**
     * Pega uma variavel de ambiente
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function get(string $key, ?string $default = null): string {
        return $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: $default;
    }

    /**
     * Adiciona uma nova variavel no ambiente
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function set(string $key, string $value): void {
        putenv("{$key}={$value}");
    }

}