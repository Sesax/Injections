package com.injection;

import java.util.Scanner;

/**
 * Hello world!
 */
public final class App {
    public static void main(String[] args) {
        
            Bdd bdd = new Bdd();
            bdd.connection();
            Scanner sc = new Scanner(System.in);
            System.out.println("Entrez votre login : ");
            String login = sc.nextLine();
            System.out.println("Entrez votre mot de passe : ");
            String password = sc.nextLine();
            if (bdd.login(login, password)) {
                System.out.println("Succes");
            } else {
                System.out.println("Fail ahah");
            }
            System.out.println("Entrez votre login : ");
            login = sc.nextLine();
            System.out.println("Entrez votre mot de passe : ");
            password = sc.nextLine();
            if (bdd.loginSafe(login, password)) {
                System.out.println("Succes Safe");
            } else {
                System.out.println("Fail ahah Pas safe cheh");
            }
    }
}
