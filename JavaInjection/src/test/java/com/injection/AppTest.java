package com.injection;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

class AppTest {

    @Test
    void mauvaisIdentifiants_loginSafe_devraitRenvoyerFalse() {

        Bdd bdd = new Bdd();
        bdd.connection();

        String login = "Pierre'#";
        String password = "dfgsdfg";

        //assertEquals(false, bdd.login(login, password), "La connexion ne devrait pas être possible");

        assertEquals(false, bdd.loginSafe(login, password), "La connexion ne devrait pas être possible");
    }
}
