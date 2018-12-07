""" End 2 end test for AddUser.php """

import unittest
from webDriversOptions import chrome_webdriver
from webDriversOptions import wait_url
from webDriversOptions import browser_register
from webDriversOptions import browser_login
from webDriversOptions import browser_logout
from webDriversOptions import browser_create_project
from webDriversOptions import browser_delete_project
from consts import File
from consts import Xpath


class AddUS(unittest.TestCase):
    """ Unit testing class for the test of the add user """
    __PROJECT_NAME = "addus"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-addus']"
    US_ID_FIELD = "//input[@name='id']"
    __US_ID = "1"
    US_DESC_FIELD = "//input[@name='desc']"
    __US_DESC = "En tant que ... je souhaite ..."
    __US_DIFF = "1"
    US_DIFF_FIELD = "//input[@name='diff']"
    VALIDATE_US_BTN = "//input[@name='validate']"
    BACKLOG_PROJECT = "Backlog.php?projectname=addus"

    def setUp(self):
        self.chrome = chrome_webdriver()

    def test_add(self):
        """
        Add a user to the database
        """
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browser_register(self.chrome)
        browser_login(self.chrome)
        browser_create_project(self.chrome, self.__PROJECT_NAME)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        list_href = self.chrome.find_element_by_xpath(
            self.__TEST_PROJECT_ENTRY)
        list_href.click()
        self.assertIn(File.BACKLOG, self.chrome.current_url)

        add_us_btn = self.chrome.find_element_by_xpath(Xpath.ADD_US_BTN)
        add_us_btn.click()
        self.assertIn(File.ADD_US, self.chrome.current_url)

        us_id_field = self.chrome.find_element_by_xpath(self.US_ID_FIELD)
        us_id_field.send_keys(self.__US_ID)

        us_desc_filed = self.chrome.find_element_by_xpath(self.US_DESC_FIELD)
        us_desc_filed.send_keys(self.__US_DESC)

        us_diff_field = self.chrome.find_element_by_xpath(self.US_DIFF_FIELD)
        us_diff_field.send_keys(self.__US_DIFF)

        submit = self.chrome.find_element_by_xpath(self.VALIDATE_US_BTN)
        submit.click()
        wait_url(self.chrome, self.BACKLOG_PROJECT)

        self.chrome.find_element_by_xpath(Xpath.HOME_BTN).click()
        wait_url(self.chrome, File.HOME_PAGE)
        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        wait_url(self.chrome, File.PROJECT_LIST)
        browser_delete_project(self.chrome, self.__PROJECT_NAME)
        browser_logout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.main()
