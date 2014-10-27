<?php

namespace Drupal\simple_fb_connect\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;



class SimpleFBConnectAdmin extends ConfigFormBase{
    /**
     * {@inheritdoc}
     */
    public function getFormID(){
        return 'simple_fb_connect_api_keys_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['simple_fb_connect_appid'] = array(
            '#type' => 'textfield',
            '#required' => TRUE,
            '#title' => t('Application ID'),
            '#default_value' => \Drupal::config('simple_fb_connect.settings')->get('simple_fb_connect_appid'),
            '#description' => t('Also called the <em>OAuth client_id</em> value on Facebook App settings pages. <a href="https://www.facebook.com/developers/createapp.php">Facebook Apps must first be created</a> before they can be added here.'),
        );

        $form['simple_fb_connect_skey'] = array(
            '#type' => 'textfield',
            '#required' => TRUE,
            '#title' => t('Application Secret'),
            '#default_value' => \Drupal::config('simple_fb_connect.settings')->get('simple_fb_connect_skey'),
            '#description' => t('Also called the <em>OAuth client_secret</em> value on Facebook App settings pages.'),
        );


        $form['simple_fb_connect_connect_url'] = array(
            '#type' => 'textfield',
            '#attributes' => array('readonly' => 'readonly'),
            '#title' => t('Connect url'),
            '#description' => t('Copy this value into Facebook Applications on Connect settings tab'),
            '#default_value' => $GLOBALS['base_url'],
        );

        $form['simple_fb_connect_login_only'] = array(
            '#type' => 'checkbox',
            '#title' => t('Login Only (No Registration)'),
            '#description' => t('Allow only existing users to login with FB. New users can not signup using FB Connect.'),
            '#default_value' => \Drupal::config('simple_fb_connect.settings')->get('simple_fb_connect_login_only'),
        );

        $form['simple_fb_connect_post_login_url'] = array(
            '#type' => 'textfield',
            '#title' => t('Post Login url'),
            '#description' => t('Drupal URL to which the user should be redirected to after successful login.'),
            '#default_value' => \Drupal::config('simple_fb_connect.settings')->get('simple_fb_connect_post_login_url'),
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        dpm($form_state->getValue('simple_fb_connect_appid'));
        dpm($form_state->getValue('simple_fb_connect_skey'));
        \Drupal::config('simple_fb_connect.settings')->set('simple_fb_connect_appid',$form_state->getValue('simple_fb_connect_appid'));
        \Drupal::config('simple_fb_connect.settings')->set('simple_fb_connect_skey',$form_state->getValue('simple_fb_connect_skey'));
        drupal_set_message($this->t('The configuration options have been saved.'));
    }
}



